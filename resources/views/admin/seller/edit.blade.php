@extends('admin.admin_template')

@section('main')
    @include('admin.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            <div class="card-text h-full ">
                <div class="input-area relative">
                    <label for="name" class="form-label">Nama <x-required /></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama"
                        value="{{ $seller->name }}" {{ !$editable ? 'disabled' : '' }}>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="input-area relative">
                    <label for="phone_number" class="form-label">Phone Number <x-required /></label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                        placeholder="Masukkan Nomor Telepon" value="{{ $seller->phone_number }}"
                        {{ !$editable ? 'disabled' : '' }}>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
                <div class="input-area relative">
                    <label for="email" class="form-label">Email <x-required /></label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email"
                        value="{{ $seller->email }}" {{ !$editable ? 'disabled' : '' }}>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <form class="space-y-4" method="POST" action="{{ route('admin.seller.update', $seller->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <button class="btn inline-flex justify-center btn-success mr-3">Accept</button>
                </form>
                <form class="space-y-4" method="POST" action="{{ route('admin.seller.update', $seller->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="0">
                    <button class="btn inline-flex justify-center btn-danger">Decline (Delete)</button>
                </form>

            </div>
        </div>
    </div>
@endsection
