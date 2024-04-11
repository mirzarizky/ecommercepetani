<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class OrderSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Order', true, route('seller.order.index')],
            ['Index', false],
        ];
        $title = 'All Orders';
        $orders = Order::with(['details' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])->latest()->get();
        return view('seller.order.index', compact('breadcrumbs', 'title', 'orders'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $breadcrumbs = [
    //         ['Order', true, route('seller.order.index')],
    //         ['Add', false],
    //     ];
    //     $title = 'Add Payment Method';
    //     return view('seller.order.create', compact('breadcrumbs', 'title'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(PaymentMethodRequest $request)
    // {
    //     $validated = $request->validated();

    //     OrderDetail::create($validated);

    //     return redirect()->route('seller.order.create')->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.store')]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $breadcrumbs = [
            ['Order', true, route('seller.order.index')],
            [$order->reff, false],
        ];
        $title = $order->reff;

        $paymentMethods = PaymentMethod::orderBy('bank_name', 'ASC')->get();

        return view('seller.order.show', compact('breadcrumbs', 'title', 'order', 'paymentMethods'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        $breadcrumbs = [
            ['Order', true, route('seller.order.index')],
            [$orderDetail->bank_name, false],
        ];
        $title = $orderDetail->bank_name;
        $editable = true;
        return view('seller.order.edit', compact('breadcrumbs', 'title', 'orderDetail', 'editable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'delivery_status' => 'required'
        ]);

        OrderDetail::where('user_id', auth()->user()->id)->update($validated);


        return redirect()->route('seller.order.show', $order->id)->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.delete')]);
    }
}
