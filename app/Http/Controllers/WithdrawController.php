<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawRequest;
use App\Models\LogMoney;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Penukaran Saldo', true, route('seller.withdraw.index')],
            ['Index', false],
        ];
        $title = 'Semua Penukaran Saldo';
        $withdraws = Withdraw::where('user_id', Auth::id())->latest()->get();
        return view('seller.withdraw.index', compact('breadcrumbs', 'title', 'withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Penukaran Saldo', true, route('seller.withdraw.index')],
            ['Tambah', false],
        ];
        $title = 'Tambah Penukaran Saldo';

        return view('seller.withdraw.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $totalMoney = LogMoney::where('user_id', Auth::id())->sum('money');

        $validated = $request->validate([
            'user_id' => 'required',
            'money' => 'required|lte:' . $totalMoney,
            'description' => 'nullable',
            'bank_name' => 'required',
            'username' => 'required',
            'rekening' => 'required',
        ]);

        Withdraw::create($validated);

        return redirect()->route('seller.withdraw.index')->with(['color' => 'bg-success-500', 'message' => __('product.success.store')]);
    }
}
