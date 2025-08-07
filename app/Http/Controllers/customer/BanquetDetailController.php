<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\customer\Review;
use App\Http\Controllers\Controller;
use App\Models\customer\BanquetManager;

class BanquetDetailController extends Controller
{
    public function banquetsDetails(Request $request, $id)
    {
        $manager = BanquetManager::with('banquet.images')->findOrFail($id);

        $perPage = 4;

        // Filter reviews for this specific banquet
        $reviewsQuery = Review::where('banquet_id', $id)->latest();

        // Paginate filtered reviews
        $reviews = $reviewsQuery->paginate($perPage);

        // Calculate stats for this banquet
        $totalReviews = $reviewsQuery->count();
        $averageRating = $reviewsQuery->avg('rating') ?? 0;

        $ratingCounts = $reviewsQuery->selectRaw('rating, count(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating')
            ->toArray();

        // Calculate rating percentages
        $ratingPercentages = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = $ratingCounts[$i] ?? 0;
            $ratingPercentages[$i] = $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0;
        }

        // If it's an AJAX request (e.g. for loading more reviews)
        if ($request->ajax()) {
            return response()->json([
                'reviews' => $reviews,
                'totalReviews' => $totalReviews,
                'averageRating' => number_format($averageRating, 1),
                'ratingCounts' => $ratingCounts,
                'ratingPercentages' => $ratingPercentages,
                'hasMore' => $reviews->hasMorePages(),
            ]);
        }

        // If it's a regular page request
        return view('customer.pages.banquet-detail', compact(
            'reviews',
            'totalReviews',
            'averageRating',
            'ratingCounts',
            'ratingPercentages',
            'manager'
        ) + ['pageTitle' => 'Banquet Details']);
    }
}
