<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $orderNonDelivered = Order::where('status', 0)->whereDate('created_at', Carbon::today())->count();
        $orders = Order::orderBy('created_at', 'DESC')->paginate(5);
        $totalSales = Order::where('status', 1)->count();
        $totalRevenue = Order::where('status', 1)->sum('total_price');
        $todaySale = Order::where('status', 1)->whereDate('created_at', Carbon::today())->count();
        $todayRevenue = Order::where('status', 1)->whereDate('created_at', Carbon::today())->sum('total_price');
        return view('admin.index', compact('totalSales', 'totalRevenue', 'todaySale', 'todayRevenue', 'orders', 'orderNonDelivered'));
    }
    public function notification()
    {
        $orderNonDelivered = Order::where('status', 0)->whereDate('created_at', Carbon::today())->count();
        return response()->json([ 'count' => $orderNonDelivered ]);
    }
}
