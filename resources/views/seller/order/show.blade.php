@extends('seller.seller_template')

@section('main')
    @include('seller.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            @include('seller.partials.alert')
            <div class="card-text h-full mb-15">
                <form class="space-y-4" method="POST" action="{{ route('seller.order.update', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="input-area relative">
                        <label for="total" class="form-label">Price</label>
                        <input type="text" id="total" name="total" class="form-control" placeholder="Total Price"
                            value="Rp. {{ number_format($order->total_price) }}" readonly>
                    </div>

                    <div>
                        <label for="payment_method_id" class="form-label">Metode Pembayaran <x-required /></label>
                        <select name="payment_method_id" id="payment_method_id"
                            class="select2 form-control w-full mt-2 py-2" disabled>
                            @foreach ($paymentMethods as $payment)
                                <option value="{{ $payment->id }}"
                                    {{ $payment->id == $order->payment_method_id ? 'selected' : '' }}
                                    class=" inline-block font-Inter font-normal text-sm text-slate-600">
                                    @if ($payment->rekening === 'cod')
                                        {{ $payment->bank_name }}
                                    @else
                                        {{ $payment->bank_name . ' - ' . $payment->rekening . ' A/N ' . $payment->username }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        @php
                            $role = [
                                [
                                    'label' => 'Pending',
                                    'value' => 'pending',
                                ],
                                [
                                    'label' => 'Process',
                                    'value' => 'process',
                                ],
                                [
                                    'label' => 'Success',
                                    'value' => 'success',
                                ],
                            ];
                        @endphp
                        <label for="delivery_status" class="form-label">Status Pengiriman <x-required /></label>
                        <select name="delivery_status" id="delivery_status" class="select2 form-control w-full mt-2 py-2">
                            @foreach ($role as $rol)
                                <option value="{{ $rol['value'] }}"
                                    {{ $rol['value'] === $order->details[0]->delivery_status ? 'selected' : '' }}
                                    class=" inline-block font-Inter font-normal text-sm text-slate-600">
                                    {{ $rol['label'] }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('delivery_status')" class="mt-2" />
                    </div>

                    @if ($order->status == 'process' && $order->details[0]->delivery_status != 'success')
                        <button class="btn inline-flex justify-center btn-dark">Update</button>
                    @endif

                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body px-6 pb-6 mt-4">
            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class=" table-th ">
                                        Id
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Gambar
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Harga
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Jumlah
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Total Harga
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Status Pengiriman
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Komentar
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($order->details as $key => $product)
                                    <tr>
                                        <td class="table-td">{{ $key + 1 }}</td>
                                        <td class="table-td">
                                            <div class="grid">
                                                <a href="{{ Storage::url($product->product_image) }}" target="_blank">
                                                    <img src="{{ Storage::url($product->product_image) }}"
                                                        class="rounded-md border-4 border-slate-300 max-w-full w-full block"
                                                        alt="image">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="table-td">{{ $product->product_name }}</td>
                                        <td class="table-td">Rp. {{ number_format($product->product_price) }}</td>
                                        <td class="table-td">{{ $product->product_qty }}</td>
                                        <td class="table-td">Rp.
                                            {{ number_format($product->product_price * $product->product_qty) }}</td>
                                        <td class="table-td">{{ $product->delivery_status }}</td>
                                        <td class="table-td">{{ $product->comment }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
