<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReviewController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $reviews = Review::where('designer_id', $request->id)->paginate(100);
        $des = Designer::find($request->id);
        return view('admin.reviews.index', compact('reviews', 'des'));
    }

    // Display the specified resource.
    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    // Remove the specified resource from storage.
    public function destroy(Review $review)
    {
        return redirect()->route('admin.reviews.index')->with('success', 'You have delete successfully.');
    }
}
