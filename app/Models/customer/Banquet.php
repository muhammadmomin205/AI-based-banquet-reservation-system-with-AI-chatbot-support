<?php

namespace App\Models\customer;

use App\Models\manager\BanquetImage;
use Illuminate\Database\Eloquent\Model;

class Banquet extends Model
{
    //
    public function images()
    {
        return $this->hasOne(BanquetImage::class);
    }
    public function banquet_manager()
    {
        return $this->belongsTo(BanquetManager::class);
    }
}
