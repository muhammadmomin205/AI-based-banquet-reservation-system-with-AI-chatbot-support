<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class ReviewVote extends Model
{
    protected $table = 'review_votes';
    protected $fillable = ['review_id', 'customer_id', 'vote'];
}
