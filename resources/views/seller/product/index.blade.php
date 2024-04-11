@extends('seller.seller_template')

@section('main')
    <div id="content_layout">
        @include('seller.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>

                    <a href="{{ route('seller.product.create') }}">
                        <button class="btn inline-flex justify-center btn-primary ">
                            <span class="flex items-center">
                                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                    icon="heroicons-outline:plus-circle"></iconify-icon>
                                <span>Tambah</span>
                            </span>
                        </button>
                    </a>
                </header>
                <div class="card-body px-6 pb-6">
                    @include('seller.partials.alert')
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
                                                Id
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Gambar
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Harga
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Satuan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Stok
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Aksi
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">
                                                    <div class="grid">
                                                        <a href="{{ Storage::url($product->image) }}" target="_blank">
                                                            <img src="{{ Storage::url($product->image) }}"
                                                                class="rounded-md border-4 border-slate-300 max-w-full w-full block"
                                                                alt="image">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="table-td">{{ $product->name }}</td>
                                                <td class="table-td">Rp. {{ number_format($product->price) }}</td>
                                                <td class="table-td">{{ $product->unit }}</td>
                                                <td class="table-td"><span
                                                        class="badge {{ $product->is_stock ? 'bg-success-500' : 'bg-danger-500' }} text-white capitalize rounded-3xl">{{ $product->is_stock ? 'Ada' : 'Kosong' }}</span>
                                                </td>
                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a href="{{ route('seller.product.show', $product->id) }}"
                                                            class="toolTip onTop justify-center action-btn"
                                                            data-tippy-content="Show" data-tippy-theme="primary">
                                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                        </a>
                                                        <a href="{{ route('seller.product.edit', $product->id) }}"
                                                            class="toolTip onTop justify-center action-btn"
                                                            data-tippy-content="Edit" data-tippy-theme="info">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                        <form action="{{ route('seller.product.destroy', $product->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="toolTip onTop justify-center action-btn"
                                                                type="submit" data-tippy-content="Delete"
                                                                data-tippy-theme="danger">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </form>
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
