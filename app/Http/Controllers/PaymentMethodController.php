<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Payment Method', true, route('admin.payment-method.index')],
            ['Index', false],
        ];
        $title = 'All Payment Methods';
        $paymentMethods = PaymentMethod::latest()->get();
        return view('admin.payment-method.index', compact('breadcrumbs', 'title', 'paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Payment Method', true, route('admin.payment-method.index')],
            ['Add', false],
        ];
        $title = 'Add Payment Method';
        return view('admin.payment-method.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentMethodRequest $request)
    {
        $validated = $request->validated();

        PaymentMethod::create($validated);

        return redirect()->route('admin.payment-method.create')->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $breadcrumbs = [
            ['Payment Method', true, route('admin.payment-method.index')],
            [$paymentMethod->bank_name, false],
        ];
        $title = $paymentMethod->bank_name;
        $editable = false;
        return view('admin.payment-method.edit', compact('breadcrumbs', 'title', 'paymentMethod', 'editable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $breadcrumbs = [
            ['Payment Method', true, route('admin.payment-method.index')],
            [$paymentMethod->bank_name, false],
        ];
        $title = $paymentMethod->bank_name;
        $editable = true;
        return view('admin.payment-method.edit', compact('breadcrumbs', 'title', 'paymentMethod', 'editable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $validated = $request->validated();

        $paymentMethod->update($validated);

        return redirect()->route('admin.payment-method.index')->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.delete')]);
    }
}
