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
            @include('admin.partials.alert')
            <div class="card-text h-full ">
                <form class="space-y-4" method="POST" action="{{ route('admin.payment-method.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="input-area relative">
                        <label for="bank_name" class="form-label">Nama Bank <x-required /></label>
                        <input type="text" id="bank_name" name="bank_name" class="form-control"
                            placeholder="Enter Bank Name" value="{{ old('bank_name') }}">
                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="username" class="form-label">Nama Pemilik <x-required /></label>
                        <input type="text" id="username" name="username" class="form-control"
                            placeholder="Enter User Name" value="{{ old('username') }}">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="rekening" class="form-label">Rekening <x-required /></label>
                        <input type="number" id="rekening" name="rekening" class="form-control"
                            placeholder="Enter Rekening" value="{{ old('rekening') }}">
                        <x-input-error :messages="$errors->get('rekening')" class="mt-2" />
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
