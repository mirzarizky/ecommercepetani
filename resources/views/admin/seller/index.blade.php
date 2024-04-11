@extends('admin.admin_template')

@section('main')
    <div id="content_layout">
        @include('admin.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>

                    {{-- <a href="{{ route('admin.seller.create') }}">
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
                                                Nama
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Email
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nomor HP
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Aksi
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">
                                                    <span class="flex">
                                                        @php
                                                            $image = null;
                                                            if (Storage::exists($user->profile_photo)) {
                                                                $image = Storage::url($user->profile_photo);
                                                            } else {
                                                                $image = Avatar::create($user->name)->toBase64();
                                                            }
                                                        @endphp
                                                        <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                            <img src="{{ $image }}" alt="{{ $user->name }}"
                                                                class="object-cover w-full h-full rounded-full">
                                                        </span>
                                                        <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">
                                                            {{ $user->name }}
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="table-td"><a
                                                        href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                <td class="table-td"><a
                                                        href="https://wa.me/{{ $user->phone_number }}">{{ $user->phone_number }}</a>
                                                </td>
                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        @if ($user->status === null)
                                                            <form action="{{ route('admin.seller.update', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="1">
                                                                <button class="toolTip onTop justify-center action-btn"
                                                                    type="submit" data-tippy-content="Terima"
                                                                    data-tippy-theme="success">
                                                                    <iconify-icon icon="heroicons:check"></iconify-icon>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('admin.seller.update', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="0">
                                                                <button class="toolTip onTop justify-center action-btn"
                                                                    type="submit" data-tippy-content="Tolak"
                                                                    data-tippy-theme="danger">
                                                                    <iconify-icon icon="heroicons:x-mark"></iconify-icon>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <span
                                                                class="badge {{ $user->status ? 'bg-success-500' : 'bg-danger-500' }} text-white capitalize rounded-3xl">{{ $user->status ? 'Terverifikasi' : 'Ditolak' }}</span>
                                                        @endif
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
