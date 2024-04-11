<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogMoneyRequest;
use App\Models\LogMoney;
use Illuminate\Http\Request;

class LogMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Log Money', true, route('admin.log-money.index')],
            ['Index', false],
        ];
        $title = 'Semua Riwayat Uang';
        $logMoneys = LogMoney::with('user')->latest()->get();
        return view('admin.log-money.index', compact('breadcrumbs', 'title', 'logMoneys'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $breadcrumbs = [
    //         ['Log Money', true, route('admin.log-money.index')],
    //         ['Add', false],
    //     ];
    //     $title = 'Add Log Money';
    //     return view('admin.log-money.create', compact('breadcrumbs', 'title'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(LogMoneyRequest $request)
    // {
    //     $validated = $request->validated();

    //     LogMoney::create($validated);

    //     return redirect()->route('admin.log-money.create')->with(['color' => 'bg-success-500', 'message' => __('logMoney.success.store')]);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(LogMoney $logMoney)
    // {
    //     $breadcrumbs = [
    //         ['Log Money', true, route('admin.log-money.index')],
    //         [$logMoney->id, false],
    //     ];
    //     $title = $logMoney->id;
    //     $editable = false;
    //     return view('admin.log-money.edit', compact('breadcrumbs', 'title', 'logMoney', 'editable'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(LogMoney $logMoney)
    // {
    //     $breadcrumbs = [
    //         ['Log Money', true, route('admin.log-money.index')],
    //         [$logMoney->id, false],
    //     ];
    //     $title = $logMoney->id;
    //     $editable = true;
    //     return view('admin.log-money.edit', compact('breadcrumbs', 'title', 'logMoney', 'editable'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(LogMoneyRequest $request, LogMoney $logMoney)
    // {
    //     $validated = $request->validated();

    //     $logMoney->update($validated);

    //     return redirect()->route('admin.log-money.index')->with(['color' => 'bg-success-500', 'message' => __('logMoney.success.update')]);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(LogMoney $logMoney)
    // {
    //     $logMoney->delete();
    //     return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('logMoney.success.delete')]);
    // }
}
