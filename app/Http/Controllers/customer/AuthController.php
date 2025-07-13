<?php

namespace App\Http\Controllers\customer;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\customer\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ManagerRegistrationEmail;
use App\Models\customer\BanquetManager;
use App\Rules\UniqueEmailMultipleTables;
use Illuminate\Support\Facades\Password;
use App\Rules\EmailNotFoundMultipleTable;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function signupManager(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'banquet_name'    => 'required|string|max:255',
            'banquet_address' => 'required|string|max:255',
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                new UniqueEmailMultipleTables
            ],
            'phone'            => 'required|regex:/^03[0-9]{9}$/',
            'password'        => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        $emailData = [
            'email_title'           => 'Banquet Registration - Pending Approval',
            'owner_name'            => $request->name,
            'intro'                 => 'Thank you for registering your banquet with BanquetHub.',
            'status'                => 'Pending Approval',
            'instructions'          => 'To complete the registration process, please upload your required documents at the link below:',
            'document_upload_link'  => 'banquet.documents.upload',
            'outro'                 => 'We’ll review your documents and get back to you shortly.',
        ];

        Mail::to($request->email)->send(new ManagerRegistrationEmail($emailData));

        $manager = new BanquetManager();
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->phone = $request->phone;
        $manager->banquet_name = $request->banquet_name;
        $manager->banquet_address = $request->banquet_address;
        $manager->password = Hash::make($request->password);
        $manager->save();

        return response()->json([
            'success' => 'Manager registered successfully!',
        ], 200);
    }
    public function signupCustomer(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                new UniqueEmailMultipleTables
            ],
            'phone'            => 'required|regex:/^03[0-9]{9}$/',
            'password'         => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->save();

        return response()->json([
            'success' => 'Customer registered successfully!',
        ], 200);
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email'    => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $customer = Auth::guard('web')->user();

            return response()->json([
                'success'    => 'Customer login successful!',
                'user_type'  => 'customer',
            ]);
        }

        if (Auth::guard('banquet_manager')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $manager = Auth::guard('banquet_manager')->user();

            return response()->json([
                'success'    => 'Banquet manager login successful!',
                'user_type'  => 'banquet_manager',
            ]);
        }

        // If both failed
        return response()->json([
            'error' => 'Invalid email or password.',
        ], 401);
    }
    public function customerLogout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return response()->json(['success' => 'Customer logged out successfully']);
        }

        return response()->json(['error' => 'No customer is currently logged in'], 403);
    }

    public function managerLogout()
    {
        if (Auth::guard('banquet_manager')->check()) {
            Auth::guard('banquet_manager')->logout();
            return response()->json(['success' => 'Manager logged out successfully']);
        }

        return response()->json(['error' => 'No manager is currently logged in'], 403);
    }
    public function showLinkRequestForm()
    {
        return view('customer.pages.auth.reset-password', ['pageTitle' => 'Reset Password']);
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                new EmailNotFoundMultipleTable
            ],
        ]);

        $email = $request->email;

        $userTypes = [
            'users' => Customer::class,
            'banquet_managers' => BanquetManager::class,
        ];

        foreach ($userTypes as $broker => $model) {
            if ($model::where('email', $email)->exists()) {
                $status = Password::broker($broker)->sendResetLink(['email' => $email]);

                return $status === Password::RESET_LINK_SENT
                    ? response()->json(['success' => __($status)])
                    : response()->json(['error' => __($status)], 401);
            }
        }
    }
    public function showUpdatePasswordForm(string $token)
    {
        return view('customer.pages.auth.update-password', ['token' => $token, 'pageTitle' => 'Update Password']);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                new EmailNotFoundMultipleTable
            ],
            'password' => 'required|min:8',
            'token' => 'required'
        ]);

        $password_reset_token = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (
            !$password_reset_token ||
            Carbon::parse($password_reset_token->created_at)->addMinutes(60)->isPast() ||
            !Hash::check($request->token, $password_reset_token->token)
        ) {
            return response()->json(['error' => 'Invalid Email or Token Expired'], 401);
        }

        $userTypes = [
            'users' => Customer::class,
            'banquet_managers' => BanquetManager::class,
        ];

        $matchedBroker = null;

        foreach ($userTypes as $broker => $model) {
            if ($model::where('email', $request->email)->exists()) {
                $matchedBroker = $broker;
                break;
            }
        }

        if (!$matchedBroker) {
            return response()->json(['error' => 'Email not found'], 404);
        }

        $status = Password::broker($matchedBroker)->reset(
            $request->only('email', 'password', 'token'),
            function ($user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['success' => __($status)])
            : response()->json(['error' => __($status)], 422);
    }
}
