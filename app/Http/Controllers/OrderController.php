<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout()
    {
        $breadcrumbs = [
            ['Checkout', true, route('customer.order.index')],
            ['Create', false],
        ];

        $title = 'Checkout';

        $paymentMethods = PaymentMethod::orderBy('bank_name', 'ASC')->get();
        $total_price = 0;

        $carts = session()->get('cart', []);

        foreach ($carts as $cart) {
            $total_price += $cart['price'] * $cart['quantity'];
        }

        return view('customer.order.create', compact('breadcrumbs', 'title', 'paymentMethods', 'total_price'));
    }

    public function store(OrderRequest $request)
    {
        $validated = $request->validated();

        try {

            DB::beginTransaction();
            $paymentMethod = PaymentMethod::findOrFail($request->payment_method_id);

            // $isDelivery = $paymentMethod->rekening === 'delivery';
            $validated['status'] = 'process';
            if ($paymentMethod->rekening !== 'cod') {
                $validated['status'] = 'pending';

                $validated['payment_proof'] = $request->payment_proof->store('picture');
                // if (!$isDelivery) {
                // }
            }

            $validated['reff'] = Carbon::today()->format('Y/m/d/') . Str::upper(Str::random(12));

            $order = Order::create(Arr::add($validated, 'price', $request->input('total_price')));

            // TODO: store OrderDetail here
            $datas = session()->get('cart');

            foreach ($datas as $id => $data) {
                $product = Product::find($id);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'user_id' => $product->user_id,
                    'product_id' => $id,
                    'product_image' => $data['image'],
                    'product_name' => $data['name'],
                    'product_qty' => $data['quantity'],
                    'product_price' => $data['price'],
                ]);
            }

            if ($request->input('delivery') != 'pickup' || $paymentMethod->rekening !== 'cod') {
                $address = Address::query()->create([
                    'user_id' => auth()->id(),

                    'address' => $request->input('address'),
                    'province' => $request->input('province'),
                    'city' => $request->input('city'),
                    'kecamatan' => $request->input('kecamatan'),
                    'zip_code' => $request->input('zip_code'),
                    'other_detail' => $request->input('other_detail'),
                ]);

                $order->update(['address_id' => $address->id]);
            }


            session()->remove('cart');

            DB::commit();

            // if ($isDelivery) {
            //     $breadcrumbs = [
            //         ['Order', true, route('customer.order.index')],
            //         ['Tambah Alamat', false],
            //     ];
            //     $title = 'Tambah Alamat';

            //     return view('customer.address.create', [
            //         'order_id' => $order->id,
            //         'breadcrumbs' => $breadcrumbs,
            //         'title' => $title,
            //     ]);
            // }

            return redirect()
                ->route('customer.order.index')
                ->with(['color' => 'bg-success-500', 'message' => __('order.success.store')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['color' => 'bg-danger-500', 'message' => $e->getMessage()]);
        }
    }

    public function index()
    {
        $breadcrumbs = [
            ['Order', true, route('customer.order.index')],
            ['List', false],
        ];

        $title = 'List Order';

        $orders = Order::with('paymentMethod')->orderBy('created_at', 'DESC')->get();

        return view('customer.order.index', compact('breadcrumbs', 'title', 'orders'));
    }

    public function show(Order $order)
    {
        $order->load(['address']);

        $breadcrumbs = [
            ['Order', true, route('customer.order.index')],
            [$order->reff, false],
        ];

        $title = $order->reff;

        $paymentMethods = PaymentMethod::orderBy('bank_name', 'ASC')->get();

        return view('customer.order.show', compact('breadcrumbs', 'title', 'order', 'paymentMethods'));
    }

    public function edit(OrderDetail $order)
    {
        $breadcrumbs = [
            ['Order', true, route('customer.order.index')],
            [$order->order->reff, true, route('customer.order.show', $order->order->id)],
            [$order->product_name, false],
        ];

        $title = $order->product_name;

        return view('customer.order.edit', compact('breadcrumbs', 'title', 'order'));
    }

    public function update(Request $request, OrderDetail $order)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        $order->update($validated);

        return redirect()->route('customer.order.show', $order->order->id)->with(['color' => 'bg-success-500', 'message' => __('order.success.store')]);
    }
}
