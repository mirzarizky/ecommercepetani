@extends('seller.seller_template')

@section('main')
    <div id="content_layout">
        @include('seller.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>

                    <a href="{{ route('seller.withdraw.create') }}">
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
                    @include('admin.partials.alert')
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
                                                Nama Bank
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama Pemilik
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Rekening
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Uang
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Deskripsi
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Status
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Waktu
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($withdraws as $key => $withdraw)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">{{ $withdraw->bank_name }}</td>
                                                <td class="table-td">{{ $withdraw->username }}</td>
                                                <td class="table-td">{{ $withdraw->rekening }}</td>
                                                <td class="table-td">Rp. {{ number_format($withdraw->money) }}</td>
                                                <td class="table-td">{{ $withdraw->description }}</td>
                                                <td class="table-td">{{ $withdraw->status }}</td>
                                                <td class="table-td">
                                                    {{ \Carbon\Carbon::parse($withdraw->created_at)->format('d M Y h:i:s') }}
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
