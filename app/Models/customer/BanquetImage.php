<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class BanquetImage extends Model
{
    public function banquet()
{
    return $this->belongsTo(Banquet::class);
}

}
