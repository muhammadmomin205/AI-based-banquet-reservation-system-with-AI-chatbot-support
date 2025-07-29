<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Models\customer\Banquet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BanquetDetailController extends Controller
{
    public function addDetails()
    {
        return view('manager.pages.banquet-details', ['pageTitle' => 'Banquet Details']);
    }
    public function saveDetails(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string |max:510',
            'guest_capacity' => 'required|integer|min:1',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'rental_rate' => 'required|numeric',
            'advance_amount' => 'required|numeric',
        ]);

        $socialMediaLinks = [
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'youtube' => $request->input('youtube'),
        ];

        // Remove individual URLs from validated array
        unset($validated['facebook'], $validated['instagram'], $validated['youtube']);

        // Set features (checkboxes)
        $features = [
            'parking_available',
            'personal_caterer_available',
            'personal_decorator_available',
            'outside_decorator_allowed',
            'ac',
            'screen_available',
            'sound_system_available',
            'bridal_room_available',
            'fire_safety',
            'security_personnel',
        ];

        foreach ($features as $feature) {
            $validated[$feature] = $request->has($feature) ? 'Yes' : 'No';
        }
        $manager = Auth::guard('banquet_manager')->user();

        $banquet = Banquet::where('manager_id', $manager->id)->first();

        if ($banquet) {
            $banquet->fill($validated);
            $banquet->social_media_links = json_encode($socialMediaLinks);
            $banquet->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Banquet details added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No banquet found for this manager.'
            ], 404);
        }
    }
}
