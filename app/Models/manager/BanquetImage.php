<?php

namespace App\Models\manager;

use App\Models\customer\Banquet;
use Illuminate\Database\Eloquent\Model;

class BanquetImage extends Model
{
    protected $tabel = 'banquet_images';
    protected $fillable = [
        'profile_image',
        'cover_image',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'img_5',
        'img_6',
        'img_7',
        'img_8',
    ];

    public function banquet()
    {
        return $this->belongsTo(Banquet::class);
    }
}
