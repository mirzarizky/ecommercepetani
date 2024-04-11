<?php

namespace App\Http\Controllers;

use App\Models\LogMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogMoneySellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Log Money', true, route('seller.log-money.index')],
            ['Index', false],
        ];
        $title = 'Semua Riwayat Uang';
        $logMoneys = LogMoney::with('user')->where('user_id', Auth::id())->latest()->get();
        return view('seller.log-money.index', compact('breadcrumbs', 'title', 'logMoneys'));
    }
}
