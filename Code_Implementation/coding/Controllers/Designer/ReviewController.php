<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $reviews = Review::where('designer_id', auth('designers')->id())->paginate(30);
        return view('designer.reviews.index', compact('reviews'));
    }

    // Display the specified resource.
    public function show(Review $review)
    {
        return view('designer.reviews.show', compact('review'));
    }
}
