<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['banquet_id','name', 'email', 'rating', 'review', 'helpful_count', 'unhelpful_count'];
    public function banquet()
    {
        return $this->belongsTo(Banquet::class);
    }
}
