<?php

namespace App\Http\Controllers;

use App\Models\LogMoney;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WithdrawAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Penukaran Saldo', true, route('admin.withdraw.index')],
            ['Index', false],
        ];
        $title = 'Semua Penukaran Saldo';
        $withdraws = Withdraw::latest()->get();
        return view('admin.withdraw.index', compact('breadcrumbs', 'title', 'withdraws'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);
        $totalMoney = LogMoney::where('user_id', $withdraw->user_id)->sum('money');

        if ($withdraw->money > $totalMoney && $validated['status'] != 'decline') {
            return redirect()->back()->with(['color' => 'bg-danger-500', 'message' => 'Saldo tidak cukup']);
        }

        if ($validated['status'] == 'decline' || $validated['status'] == 'process') {
            $withdraw->update($validated);
            return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('product.success.store')]);
        }

        if ($validated['status'] == 'success') {
            $withdraw->update($validated);
            $date = Carbon::parse($withdraw->created_at)->format('d M Y h:i:s');
            LogMoney::create([
                'user_id' => $withdraw->user_id,
                'description' => "Penukaran Saldo tanggal $date",
                'money' => $withdraw->money * -1
            ]);

            return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('product.success.store')]);
        }
    }
}
