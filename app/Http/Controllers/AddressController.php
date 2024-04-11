<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $orderId)
    {
        $request->validate([
            'address' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'kecataman' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'numeric', 'digits:6'],
            'other_detail' => ['nullable', 'string', 'max:255'],
        ]);

        $address = Address::query()->create([
            'user_id' => auth()->id(),

            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'kecataman' => $request->input('kecataman'),
            'zip_code' => $request->input('zip_code'),
            'other_detail' => $request->input('other_detail'),
        ]);

        Order::query()
            ->where('id', $orderId)
            ->update(['address_id' => $address->id]);

        return redirect()->route('customer.order.index');
    }
}
