<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\DiscountCoupon;
use App\Models\FashionDesign;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class DiscountController extends Controller
{

    // Display a listing of the resource.
    public function index()
    {
        $discounts = DiscountCoupon::where('designer_id', auth('designers')->id())->paginate(30);
        return view('designer.discounts.index', compact('discounts'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('designer.discounts.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->validate([
                    'code'                  => 'required|string|max:255',
                    'description'           => 'nullable|string',
                    'discount_percentage'   => 'required|numeric|max:100|min:0',
                    'valid_from'            => 'required|date',
                    'valid_to'              => 'required|date',
                ]);

        $data['designer_id'] = auth('designers')->id();
        DiscountCoupon::create($data);
        return redirect()->route('designer.discounts.index')->with('success', 'You have created successfully.');
    }

    // Display the specified resource.
    public function show(DiscountCoupon $discount)
    {
        $item = $discount;
        return view('designer.discounts.show', compact('discount', 'item'));
    }

    // Show the form for editing the specified resource.
    public function edit(DiscountCoupon $discount)
    {
        $item = $discount;
        return view('designer.discounts.edit', compact('discount', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, DiscountCoupon $discount)
    {
        abort_if($discount->designer_id != auth('designers')->id(), 404);
        $data =    $request->validate([
            'code'                  => 'required|string|max:255',
            'description'           => 'nullable|string',
            'discount_percentage'   => 'required|numeric|max:100|min:0',
            'valid_from'            => 'required|date',
            'valid_to'              => 'required|date',
                    ]);

        $discount->update($data);

        return redirect()->route('designer.discounts.index')->with('success', 'You have updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(DiscountCoupon $discount)
    {
        abort_if($discount->designer_id != auth('designers')->id(), 404);
        return redirect()->route('designer.discounts.index')->with('success', 'You have delete successfully.');
    }
}
