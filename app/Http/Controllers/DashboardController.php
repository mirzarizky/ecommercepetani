<?php

namespace App\Http\Controllers;

use App\Models\LogMoney;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else if ($role === 'seller') {
            return redirect()->route('seller.dashboard');
        } else if ($role === 'customer') {
            return redirect()->route('customer.dashboard');
        }
    }

    public function admin()
    {
        $totalKeuangan = LogMoney::sum('money');
        $totalOrder = Order::count();
        $totalCustomer = User::where('role', 'customer')->count();
        return view('admin.dashboard.index', compact('totalKeuangan', 'totalOrder', 'totalCustomer'));
    }

    public function seller()
    {
        $totalMoney = LogMoney::where('user_id', Auth::id())->sum('money');
        $totalThisMonth = LogMoney::where('user_id', Auth::id())->where('money', '>=', 0)->whereMonth('created_at', Carbon::now()->month)->sum('money');
        $sellProduct = OrderDetail::where('user_id', Auth::id())->where('delivery_status', 'success')->sum('product_qty');
        return view('seller.dashboard.index', compact('totalMoney', 'totalThisMonth', 'sellProduct'));
    }

    public function customer()
    {
        $totalOrder = Order::where('user_id', Auth::id())->count();
        $totalPengeluaran = Order::where('user_id', Auth::id())->sum('total_price');
        $totalSukses = Order::where('user_id', Auth::id())->where('status', 'success')->count();
        return view('customer.dashboard.index', compact('totalOrder', 'totalPengeluaran', 'totalSukses'));
    }
}
