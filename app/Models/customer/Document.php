<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'manager_id',
        'utility_bills',
        'business_card',
        'banquet_image',
        'cnic_front',
        'cnic_back',
        'live_selfie',
    ];
    public function banquet_manager()
    {
        return $this->belongsTo(BanquetManager::class);
    }
}
