<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $orders = Order::where('designer_id', auth('designers')->id())->latest()->paginate(30);
        return view('designer.orders.index', compact('orders'));
    }

    // Display the specified resource.
    public function show(Order $order)
    {
        return view('designer.orders.show', compact('order'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:order,order_id',
            'status' => 'required|in:pending,accepted,rejected,completed',
        ]);
        $order = Order::findOrFail($request->order_id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

}
