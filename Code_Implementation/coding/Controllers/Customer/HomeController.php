<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\FashionDesign;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index()
   {
      $bestSales = FashionDesign::join('order_item', 'product.product_id', '=', 'order_item.product_id')
        ->join('order', 'order_item.order_id', '=', 'order.order_id')
        ->select('order_item.product_id', 'product.title','product.image', 'product.price', DB::raw('COUNT(order_item.product_id) as total_orders'))
        ->where('order.status', 'completed')
        ->groupBy('order_item.product_id', 'product.title', 'product.price', 'product.image')
        ->orderBy('total_orders', 'desc')
        ->take(8)
        ->get();
      $newFashions = FashionDesign::take(8)->get();
      return view('customer.main.index', compact('bestSales', 'newFashions'));
   }

   public function contact()
   {
      return view('customer.contact.index');
   }
}
