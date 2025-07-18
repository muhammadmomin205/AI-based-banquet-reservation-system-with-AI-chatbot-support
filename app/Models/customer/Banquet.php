<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class Banquet extends Model
{
    //
    public function images()
    {
        return $this->hasOne(BanquetImage::class);
    }
}
