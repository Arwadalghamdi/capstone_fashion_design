<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $orders = Order::whereHas('items', function($qq){
            return $qq->whereHas('fashionDesign', function($qqq){
                return $qqq->where('designer_id', auth('designers')->id());
            });
        })->latest()->paginate(30);
        return view('designer.orders.index', compact('orders'));
    }

    // Display the specified resource.
    public function show(Order $order)
    {
        return view('designer.orders.show', compact('order'));
    }
}
