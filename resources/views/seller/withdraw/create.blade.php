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
            <div class="card-text h-full ">
                <form class="space-y-4" method="POST" action="{{ route('seller.withdraw.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="input-area relative">
                        <label for="bank_name" class="form-label">Nama Bank <x-required /></label>
                        <input type="text" id="bank_name" name="bank_name" class="form-control"
                            placeholder="Masukkan Nama Bank" value="{{ old('bank_name') }}">
                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="username" class="form-label">Nama Pemilik <x-required /></label>
                        <input type="text" id="username" name="username" class="form-control"
                            placeholder="Masukkan Nama Pemilik" value="{{ old('username') }}">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="rekening" class="form-label">Rekening <x-required /></label>
                        <input type="number" id="rekening" name="rekening" class="form-control"
                            placeholder="Masukkan Nomor Rekening" value="{{ old('rekening') }}">
                        <x-input-error :messages="$errors->get('rekening')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="money" class="form-label">Jumlah Uang <x-required /></label>
                        <input type="number" id="money" name="money" class="form-control"
                            placeholder="Masukkan Jumlah Uang" value="{{ old('money') }}">
                        <x-input-error :messages="$errors->get('money')" class="mt-2" />
                    </div>

                    <div class="card-text h-full space-y-4">
                        <div class="input-area">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="5" placeholder="Deskripsi">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
