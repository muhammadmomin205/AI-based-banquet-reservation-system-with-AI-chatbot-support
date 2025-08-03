<?php

namespace App\Http\Controllers\customer;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\customer\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\customer\BanquetBooking;
use App\Models\customer\BanquetManager;
use Illuminate\Support\Facades\Validator;

class BanquetBookingController extends Controller
{
    public function banquetsBooking(String $id)
    {
        $manager = BanquetManager::with('banquet.images')->get()->findOrFail($id);

        return view('customer.pages.banquet-booking', [
            'pageTitle' => 'Banquet Booking',
            'manager' => $manager
        ]);
    }

    public function bookBanquet(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'event_date' => 'required|date|after_or_equal:today',
            'event_time' => 'required|string',
            'special_requirements' => 'nullable|string|max:1000',
        ]);

        $bookingId = 'BNQ-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

        $banquet_booking = new BanquetBooking();
        $banquet_booking->booking_id = $bookingId;
        $banquet_booking->name = Auth::user()->name;
        $banquet_booking->email = Auth::user()->email;
        $banquet_booking->phone = Auth::user()->phone;
        $banquet_booking->address = $request->address;
        $banquet_booking->event_date = $request->event_date;
        $banquet_booking->event_time = $request->event_time;
        $banquet_booking->special_requirements = $request->special_requirements;
        $banquet_booking->save();

        // Get logged-in customer
        $customer = Customer::where('email', Auth::user()->email)->first();

        // Attach the booking to the customer (insert into pivot table)
        if ($customer) {
            $customer->banquetBookings()->attach($banquet_booking->id);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Booking submitted successfully.',
        ]);
    }
}
