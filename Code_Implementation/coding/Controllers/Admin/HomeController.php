<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Designer;
use App\Models\FashionDesign;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'customers'  => Customer::count(),
            'designer'   => Designer::count(),
            'fashion'    => FashionDesign::count(),
            'orders'     => Order::count(),
            'reviews'    => Review::count()
        ];

        $ordersPerMonth = Order::selectRaw("DATE_FORMAT(created_at, '%M') as month, COUNT(*) as count, MIN(created_at) as created_at")
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('created_at')
            ->pluck('count', 'month')
            ->toArray();

        $reviewsPerMonth = Review::selectRaw("DATE_FORMAT(created_at, '%M') as month, COUNT(*) as count, MIN(created_at) as created_at")
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('created_at')
            ->pluck('count', 'month')
            ->toArray();

        $reviews = Review::latest('created_at')->take(6)->get();

        return view('admin.dashboard.index', compact('stats', 'reviews', 'ordersPerMonth', 'reviewsPerMonth'));
    }


}
