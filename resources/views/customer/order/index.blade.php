@extends('customer.customer_template')

@section('main')
    <div id="content_layout">
        @include('customer.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>

                    {{-- <a href="{{ route('customer.user.create') }}">
                        <button class="btn inline-flex justify-center btn-primary ">
                            <span class="flex items-center">
                                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                    icon="heroicons-outline:plus-circle"></iconify-icon>
                                <span>Tambah</span>
                            </span>
                        </button>
                    </a> --}}
                </header>
                <div class="card-body px-6 pb-6">
                    @include('customer.partials.alert')
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Reff
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Image
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Payment Method
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Total Price
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Status
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td class="table-td">{{ $order->reff }}</td>
                                                <td class="table-td">
                                                    @if ($order->paymentMethod->rekening !== 'cod')
                                                        <div class="grid">
                                                            <a href="{{ Storage::url($order->payment_proof) }}"
                                                                target="_blank">
                                                                <img src="{{ Storage::url($order->payment_proof) }}"
                                                                    class="rounded-md border-4 border-slate-300 max-w-full w-full block"
                                                                    alt="image">
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="table-td">{{ $order->paymentMethod->bank_name }}</td>
                                                <td class="table-td">Rp. {{ number_format($order->total_price) }}</td>
                                                <td class="table-td">{{ $order->status }}</td>

                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a href="{{ route('customer.order.show', $order->id) }}"
                                                            class="toolTip onTop justify-center action-btn"
                                                            data-tippy-content="Show" data-tippy-theme="primary">
                                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                        </a>
                                                    </div>
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
        </div>

    </div>
@endsection
