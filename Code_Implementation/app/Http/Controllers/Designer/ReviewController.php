<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $reviews = Review::where('designer_id', auth('designers')->id());
        if ($request->filled('id')) {
            $reviews = $reviews->where('product_id', $request->id);
        }
        $reviews = $reviews->get();
        return view('designer.reviews.index', compact('reviews'));
    }

    // Display the specified resource.
    public function show(Review $review)
    {
        return view('designer.reviews.show', compact('review'));
    }
}
