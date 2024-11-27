<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FashionDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FashionController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $designers = FashionDesign::paginate(30);
        return view('admin.fashion_design.index', compact('designers'));
    }

    // Display the specified resource.
    public function show(FashionDesign $fashion)
    {
        $designer = $fashion;
        return view('admin.fashion_design.show', compact('designer', 'fashion'));
    }

    // Remove the specified resource from storage.
    public function destroy(FashionDesign $fashion)
    {
        return redirect()->route('admin.fehions.index')->with('success', 'You have delete successfully.');
    }
}
