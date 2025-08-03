<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class BanquetBooking extends Model
{
    protected $table = 'banquet_bookings';
    protected $guarded =[];
    
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_banquet_booking', 'banquet_booking_id', 'customer_id');
    }
}
