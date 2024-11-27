<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\FashionDesign;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReportController extends Controller
{
    // Display a listing of the resource.
    public function fashions()
    {
        $topDesigns = FashionDesign::where('designer_id', auth('designers')->id())
        ->join('order_item', 'product.product_id', '=', 'order_item.product_id')
        ->join('order', 'order_item.order_id', '=', 'order.order_id')
        ->select('product.title', DB::raw('COUNT(order_item.product_id) as total_orders'))
        ->where('order.status', 'completed')
        ->groupBy('order_item.product_id', 'product.title')
        ->orderBy('total_orders', 'desc')
        ->take(10)
        ->get();
        $lbls = [];
        $nums = [];
        $cols = [];
        foreach ($topDesigns as $key => $value) {
            $cols[] = random_color();
            $nums[] = $value->total_orders;
            $lbls[] = $value->title;
        }
        return view('designer.reports.fashion', compact('topDesigns', 'cols', 'nums', 'lbls'));
    }

    public function customer()
    {
        $topCustomers = Order::whereHas('items', function($q){
                        return $q->whereHas('fashionDesign', function($qq){
                            return $qq->where('designer_id', auth('designers')->id());
                        });
                        })
                        ->join('customer', 'order.customer_id', '=', 'customer.customer_id')
                        ->select('customer.name', DB::raw('COUNT(order.order_id) as total_orders'))
                        ->groupBy('customer.customer_id', 'customer.name')
                        ->orderBy('total_orders', 'desc')
                        ->take(10)
                        ->get();
        $lbls = [];
        $nums = [];
        $cols = [];
        foreach ($topCustomers as $key => $value) {
            $cols[] = random_color();
            $nums[] = $value->total_orders;
            $lbls[] = $value->name;
        }
        return view('designer.reports.customer', compact('topCustomers', 'cols', 'nums', 'lbls'));
    }
}
