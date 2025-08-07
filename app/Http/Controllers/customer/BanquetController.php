<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\customer\Review;
use App\Http\Controllers\Controller;
use App\Models\customer\BanquetManager;

class BanquetController extends Controller
{
    public function banquets()
    {
        $banquets = BanquetManager::with('banquet.images')->get();
        $reviews = Review::latest()->take(10)->get();
        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();

        return view('customer.pages.banquet', [
            'pageTitle' => 'Banquets',
            'banquets' => $banquets,
            'reviews' => $reviews,
            'averageRating' => $averageRating,
            'totalReviews' => $totalReviews
        ]);
    }
}
