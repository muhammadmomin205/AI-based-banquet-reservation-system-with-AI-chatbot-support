<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class UploadDocument extends Model
{
    protected $table = 'upload_documents'; 

    protected $fillable = [
        'manager_id',
        'utility_bills',
        'business_card',
        'banquet_image',
        'cnic_front',
        'cnic_back',
        'live_selfie',
    ];
}
