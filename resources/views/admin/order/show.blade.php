@extends('admin.admin_template')

@section('main')
@include('admin.partials.breadcrumb')
<div class="card">
    <div class="flex flex-col p-6 card-body">
        <header class="flex items-center px-6 pb-5 mb-5 -mx-6 border-b border-slate-100 dark:border-slate-700">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
            </div>
        </header>
        @include('admin.partials.alert')
        <div class="h-full card-text mb-15">
            <form class="space-y-4" method="POST" action="{{ route('admin.order.update', $order->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="relative input-area">
                    <label for="total" class="form-label">Price</label>
                    <input type="text" id="total" name="total" class="form-control" placeholder="Total Price" value="Rp. {{ number_format($order->total_price) }}" readonly>
                </div>

                <div>
                    <label for="payment_method_id" class="form-label">Metode Pembayaran <x-required /></label>
                    <select name="payment_method_id" id="payment_method_id" class="w-full py-2 mt-2 select2 form-control" disabled>
                        @foreach ($paymentMethods as $payment)
                        <option value="{{ $payment->id }}" {{ $payment->id === $order->payment_method_id ? 'selected' : '' }} class="inline-block text-sm font-normal font-Inter text-slate-600">
                            @if ($payment->rekening === 'cod')
                            {{ $payment->bank_name }}
                            @else
                            {{ $payment->bank_name . ' - ' . $payment->rekening . ' A/N ' . $payment->username }}
                            @endif
                        </option>
                        @endforeach
                    </select>
                </div>

                @if ($order->payment_proof)
                <div class="grid grid-cols-1 gap-5 xl:grid-cols-6 lg:grid-cols-3 md:grid-cols-3">
                    <a href="{{ Storage::url($order->payment_proof) }}" target="_blank">
                        <img src="{{ Storage::url($order->payment_proof) }}" class="block w-full max-w-full border-4 rounded-md border-slate-300" alt="image">
                    </a>
                </div>
                @endif

                <div>
                    @php
                    $role = [
                    [
                    'label' => 'Pending',
                    'value' => 'pending',
                    ],
                    [
                    'label' => 'Proses',
                    'value' => 'process',
                    ],
                    [
                    'label' => 'Sukses',
                    'value' => 'success',
                    ],
                    [
                    'label' => 'Tolak',
                    'value' => 'decline',
                    ],
                    ];
                    @endphp
                    <label for="status" class="form-label">Order Status <x-required /></label>
                    <select name="status" id="status" class="w-full py-2 mt-2 select2 form-control">
                        @foreach ($role as $rol)
                        <option value="{{ $rol['value'] }}" {{ $rol['value'] === $order->status ? 'selected' : '' }} class="inline-block text-sm font-normal font-Inter text-slate-600">
                            {{ $rol['label'] }}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="delivery_price" class="form-label">Ongkos Kirim</label>
                    <input type="number" name="delivery_price" class="form-control" id="delivery_price" placeholder="" value="{{ $order->delivery_price }}">
                    <x-input-error :messages="$errors->get('delivery_price')" class="mt-2" />
                </div>

                <div>
                    <label for="payment_method_id" class="form-label">Delivery <x-required /></label>
                    <select name="delivery" id="" class="w-full py-2 mt-2 select2 form-control" disabled>
                        <option value="delivery" {{ $order->delivery_price == 'delivery' ? 'selected': '' }}>Antar Ke Alamat</option>
                        <option value="pickup" {{ $order->delivery_price == 'pickup' ? 'selected': '' }}>Ambil di Tempat</option>
                    </select>
                </div>

                <hr>

                <div class="input-area">
                    <label for="address" class="form-label">Nama Jalan</label>
                    <textarea class="form-control" id="address" rows="3" name="address" disabled>
                    {!! $order->address->address !!}
                    </textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="other_detail" class="form-label">Detail Lainnya</label>
                    <input type="text" name="other_detail" class="form-control" id="other_detail" value="{{ $order->address->other_detail }}" placeholder="">
                    <x-input-error :messages="$errors->get('other_detail')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <input type="text" name="province" class="form-control" id="province" placeholder="" disabled value="{{ $order->address->province }}">
                    <x-input-error :messages="$errors->get('province')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Kota/Kabupaten</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="" disabled value="{{ $order->address->city }}">
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="" disabled value="{{ $order->address->kecamatan }}">
                    <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="zip_code" class="form-label">Kode POS</label>
                    <input type="number" name="zip_code" class="form-control" id="zip_code" placeholder="" value="{{ $order->address->zip_code }}" disabled>
                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                </div>

                @if ($order->status != 'decline' && $order->status != 'success')
                <button class="inline-flex justify-center btn btn-dark">Update</button>
                @endif

            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="px-6 pb-6 mt-4 card-body">
        <div class="-mx-6 overflow-x-auto dashcode-data-table">
            <span class="hidden col-span-8 "></span>
            <span class="hidden col-span-4 "></span>
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y table-fixed divide-slate-100 dark:divide-slate-700 data-table">
                        <thead class=" bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class=" table-th">
                                    Id
                                </th>
                                <th scope="col" class=" table-th">
                                    Gambar
                                </th>
                                <th scope="col" class=" table-th">
                                    Nomor HP Penjual
                                </th>
                                <th scope="col" class=" table-th">
                                    Nama Produk
                                </th>
                                <th scope="col" class=" table-th">
                                    Harga
                                </th>
                                <th scope="col" class=" table-th">
                                    Jumlah
                                </th>

                                <th scope="col" class=" table-th">
                                    Total Harga
                                </th>
                                <th scope="col" class=" table-th">
                                    Status Pengiriman
                                </th>
                                <th scope="col" class=" table-th">
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
                                            <img src="{{ Storage::url($product->product_image) }}" class="block w-full max-w-full border-4 rounded-md border-slate-300" alt="image">
                                        </a>
                                    </div>
                                </td>
                                <td class="table-td">{{ $product->user->phone_number }}</td>
                                <td class="table-td">{{ $product->product_name }}</td>
                                <td class="table-td">Rp. {{ number_format($product->product_price) }}</td>
                                <td class="table-td">{{ $product->product_qty }}</td>
                                <td class="table-td">Rp.
                                    {{ number_format($product->product_price * $product->product_qty) }}
                                </td>
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