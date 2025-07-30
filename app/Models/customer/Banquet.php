<?php

namespace App\Models\customer;

use App\Models\manager\BanquetImage;
use Illuminate\Database\Eloquent\Model;

class Banquet extends Model
{
    public $table = 'banquets';
    protected $guarded = [];
    
    public function images()
    {
        return $this->hasOne(BanquetImage::class , 'banquet_id');
    }
    public function banquet_manager()
    {
        return $this->belongsTo(BanquetManager::class);
    }
}
