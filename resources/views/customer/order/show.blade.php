@extends('customer.customer_template')

@section('main')
    @include('customer.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            @include('customer.partials.alert')
            <div class="card-text h-full mb-15">
                <form class="space-y-4" method="POST" action="{{ route('customer.order.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="input-area relative">
                        <label for="total" class="form-label">Price</label>
                        <input type="text" id="total" name="total" class="form-control" placeholder="Total Price"
                            value="Rp. {{ number_format($order->total_price) }}" readonly>
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    @if ($order->delivery_price)
                    <div class="input-area relative">
                        <label for="delivery" class="form-label">Ongkos Kirim</label>
                        <input type="text" id="delivery" name="delivery" class="form-control" placeholder="Ongkos Kirim"
                            value="Rp. {{ number_format($order->delivery_price) }}" readonly>
                    </div>

                    <div class="input-area relative">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="text" id="total_price" name="total" class="form-control" placeholder="Total Price"
                            value="Rp. {{ number_format($order->total_price + $order->delivery_price) }}" readonly>
                    </div>
                    @endif

                    <div>
                        <label for="payment_method_id" class="form-label">Payment Method <x-required /></label>
                        <select name="payment_method_id" id="payment_method_id"
                            class="select2 form-control w-full mt-2 py-2" disabled>
                            @foreach ($paymentMethods as $payment)
                                <option value="{{ $payment->id }}"
                                    {{ $payment->id === $order->payment_method_id ? 'selected' : '' }}
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

                    @if ($order->payment_proof)
                        <div class="grid xl:grid-cols-6 lg:grid-cols-3 md:grid-cols-3 grid-cols-1 gap-5">
                            <a href="{{ Storage::url($order->payment_proof) }}" target="_blank">
                                <img src="{{ Storage::url($order->payment_proof) }}"
                                    class="rounded-md border-4 border-slate-300 max-w-full w-full block" alt="image">
                            </a>
                        </div>
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
                                        Image
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Phone Number Seller
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Name
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Price
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Quantity
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Delivery Status
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Comment
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Action
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
                                        <td class="table-td">{{ $product->user->phone_number }}</td>
                                        <td class="table-td">{{ $product->product_name }}</td>
                                        <td class="table-td">Rp. {{ number_format($product->product_price) }}</td>
                                        <td class="table-td">{{ $product->product_qty }}</td>
                                        <td class="table-td">{{ $product->delivery_status }}</td>
                                        <td class="table-td">{{ $product->comment }}</td>
                                        <td class="table-td ">
                                            @if ($product->comment === null && $product->delivery_status === 'success')
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    <a href="{{ route('customer.order.edit', $product->id) }}"
                                                        class="toolTip onTop justify-center action-btn"
                                                        data-tippy-content="Comment" data-tippy-theme="info">
                                                        <iconify-icon
                                                            icon="heroicons:chat-bubble-oval-left-ellipsis"></iconify-icon>
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
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
