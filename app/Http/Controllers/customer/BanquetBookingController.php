<?php

namespace App\Http\Controllers\customer;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $opening = Carbon::createFromFormat('H:i:s', $manager->banquet->opening_time);
        $closing = Carbon::createFromFormat('H:i:s', $manager->banquet->closing_time);

        // Handle next-day closing time
        if ($closing->lessThan($opening)) {
            $closing->addDay();
        }

        $slots = [];
        $current = $opening->copy();

        while ($current->copy()->addHours(3)->lessThanOrEqualTo($closing)) {
            $start = $current->copy();
            $end = $current->copy()->addHours(3);
            $slots[] = $start->format('g A') . ' - ' . $end->format('g A');

            // Move current time ahead by 5 hours (3 hours slot + 1 hours gap)
            $current->addHours(4);
        }

        return view('customer.pages.banquet-booking', [
            'pageTitle' => 'Banquet Booking',
            'manager' => $manager,
            'slots' => $slots
        ]);
    }

    public function bookBanquet(Request $request)
    {
        // Step 1: Validate user input
        $request->validate([
            'address' => 'required|string|max:255',
            'event_date' => 'required|date|after_or_equal:today',
            'event_time' => 'required|string',
            'special_requirements' => 'nullable|string|max:1000',
        ]);

        // Step 2: Check if slot is already booked
        $isSlotBooked = BanquetBooking::where('banquet_id', $request->banquet_id)
            ->where('event_date', $request->event_date)
            ->where('event_time', $request->event_time)
            ->exists();


        if ($isSlotBooked) {
            return response()->json([
                'status' => 'error',
                'message' => 'The selected date and time slot is already booked.',
            ], 422);
        }

        // Step 3: Generate unique booking ID
        $bookingId = 'BNQ-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

        // Step 4: Save new booking
        $banquet_booking = new BanquetBooking();
        $banquet_booking->banquet_id = $request->banquet_id;
        $banquet_booking->booking_id = $bookingId;
        $banquet_booking->name = Auth::user()->name;
        $banquet_booking->email = Auth::user()->email;
        $banquet_booking->phone = Auth::user()->phone;
        $banquet_booking->address = $request->address;
        $banquet_booking->event_date = $request->event_date;
        $banquet_booking->event_time = $request->event_time;
        $banquet_booking->special_requirements = $request->special_requirements;
        $banquet_booking->save();

        // Step 5: Attach booking to customer
        $customer = Customer::where('email', Auth::user()->email)->first();
        if ($customer) {
            $customer->banquetBookings()->attach($banquet_booking->id);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Booking submitted successfully.',
        ]);
    }
}
