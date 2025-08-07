<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\customer\Review;
use App\Models\customer\ReviewVote;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banquet_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|min:10|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $review = Review::create([
            'banquet_id' => $request->banquet_id,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'review' => $request->review,
            'helpful_count' => 0,
            'unhelpful_count' => 0
        ]);
        // Calculate stats
        $totalReviews = Review::count();
        $averageRating = Review::avg('rating') ?? 0;

        $ratingCounts = Review::selectRaw('rating, count(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating')
            ->toArray();

        $ratingPercentages = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = $ratingCounts[$i] ?? 0;
            $ratingPercentages[$i] = $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0;
        }

        return response()->json([
            'success' => true,
            'review' => $review,
            'totalReviews' => $totalReviews,
            'averageRating' => number_format($averageRating, 1),
            'ratingCounts' => $ratingCounts,
            'ratingPercentages' => $ratingPercentages
        ]);
    }

    public function vote(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'action' => 'required|in:helpful,unhelpful'
        ]);

        $existingVote = ReviewVote::where('review_id', $request->review_id)
            ->where('customer_id', Auth::user()->id)
            ->first();

        if ($existingVote) {
            return response()->json(['message' => 'Already voted'], 403);
        }

        ReviewVote::create([
            'review_id' => $request->review_id,
            'customer_id' => Auth::user()->id,
            'vote' => $request->action
        ]);

        // Increment count on the Review model
        $review = Review::find($request->review_id);
        if ($request->action === 'helpful') {
            $review->increment('helpful_count');
        } else {
            $review->increment('unhelpful_count');
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Voted successfully'
        ]);
    }
}
