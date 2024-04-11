<?php

namespace App\Http\Controllers;

use App\Models\LogMoney;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            ['Index', false],
        ];
        $title = 'All Orders';
        $orders = Order::with(['details'])->latest()->get();
        return view('admin.order.index', compact('breadcrumbs', 'title', 'orders'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $breadcrumbs = [
    //         ['Order', true, route('admin.order.index')],
    //         ['Add', false],
    //     ];
    //     $title = 'Add Payment Method';
    //     return view('admin.order.create', compact('breadcrumbs', 'title'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(PaymentMethodRequest $request)
    // {
    //     $validated = $request->validated();

    //     OrderDetail::create($validated);

    //     return redirect()->route('admin.order.create')->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.store')]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            [$order->reff, false],
        ];
        $title = $order->reff;

        $paymentMethods = PaymentMethod::orderBy('bank_name', 'ASC')->get();

        $order = Order::with(['details.user', 'address'])->find($order->id);

        // dd($order);

        return view('admin.order.show', compact('breadcrumbs', 'title', 'order', 'paymentMethods'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            [$orderDetail->bank_name, false],
        ];
        $title = $orderDetail->bank_name;
        $editable = true;
        return view('admin.order.edit', compact('breadcrumbs', 'title', 'orderDetail', 'editable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required',
            'delivery_price' => 'nullable'
        ]);

        try {
            DB::beginTransaction();

            $order->update($validated);
            $order->update(['total_price' => $order->price + $order->delivery_price]);

            if ($validated['status'] == 'success') {
                $details = $order->details;

                foreach ($details as $detail) {
                    $total_price = $detail->product_qty * $detail->product_price;
                    LogMoney::create([
                        'user_id' => $detail->user_id,
                        'description' => "Produk terjual --> $detail->product_name",
                        'money' => $total_price
                    ]);

                    if ($order->paymentMethod->rekening == 'cod') {
                        LogMoney::create([
                            'user_id' => $detail->user_id,
                            'description' => "Produk COD --> $detail->product_name",
                            'money' => $total_price * -1
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.order.show', $order->id)->with(['color' => 'bg-success-500', 'message' => __('paymentMethod.success.update')]);
        } catch (\Exception $e) {
            DB::rollback();
        }
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
