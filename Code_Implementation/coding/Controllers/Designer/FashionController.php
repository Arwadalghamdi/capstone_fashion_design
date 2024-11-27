<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\FashionDesign;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class FashionController extends Controller
{
    use UploadFile;

    // Display a listing of the resource.
    public function index()
    {
        $fashions = FashionDesign::where('designer_id', auth('designers')->id())->paginate(30);
        return view('designer.fashions.index', compact('fashions'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $cats = Category::pluck('name', 'category_id');
        return view('designer.fashions.create', compact('cats'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->validate([
                    'title'                 => 'required|string|max:255',
                    'description'           => 'nullable|string',
                    'price'                 => 'required|numeric',
                    'image'                 => 'nullable|image',
                    'availability_status'   => 'required|in:available,unavailable',
                    'category_id'           => 'required|integer|exists:category,category_id',
                    'sizes'                 => 'required|array',
                    'fabrics'               => 'required',
                    'colors'                => 'required|array'
                    
                ]);

        $data['image']       = $request->hasFile('image') && $request->image != null ? $this->upload($request->image) : null;
        $data['designer_id'] = auth('designers')->id();
        FashionDesign::create($data);
        return redirect()->route('designer.fashions.index')->with('success', 'You have created successfully.');
    }

    // Display the specified resource.
    public function show(FashionDesign $fashion)
    {
        $item = $fashion;
        return view('designer.fashions.show', compact('fashion', 'item'));
    }

    // Show the form for editing the specified resource.
    public function edit(FashionDesign $fashion)
    {
        $item = $fashion;
        $cats = Category::pluck('name', 'category_id');
        return view('designer.fashions.edit', compact('fashion', 'item', 'cats'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, FashionDesign $fashion)
    {
        abort_if($fashion->designer_id != auth('designers')->id(), 404);
        $data =    $request->validate([
                        'title'                 => 'required|string|max:255',
                        'description'           => 'nullable|string',
                        'price'                 => 'required|numeric',
                        'image'                 => 'nullable|image',
                        'availability_status'   => 'required|in:available,unavailable',
                        'category_id'           => 'required|integer|exists:category,category_id',
                        'sizes'                 => 'required|array',
                        'fabrics'               => 'required',
                        'colors'                => 'required|array'
                    ]);

        $fashion->update($data);

        return redirect()->route('designer.fashions.index')->with('success', 'You have updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(FashionDesign $fashion)
    {
        abort_if($fashion->designer_id != auth('designers')->id(), 404);
        return redirect()->route('designer.fashions.index')->with('success', 'You have delete successfully.');
    }
}
