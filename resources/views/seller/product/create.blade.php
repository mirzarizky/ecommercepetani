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
                <form class="space-y-4" method="POST" action="{{ route('seller.product.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div>
                        <label for="category_id" class="form-label">Kategori <x-required /></label>
                        <select name="category_id" id="category_id" class="select2 form-control w-full mt-2 py-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id === old('category_id') ? 'selected' : '' }}
                                    class=" inline-block font-Inter font-normal text-sm text-slate-600">
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-area relative">
                        <label for="name" class="form-label">Nama <x-required /></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name"
                            value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="price" class="form-label">Harga <x-required /></label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Enter price"
                            value="{{ old('price') }}">
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="unit" class="form-label">Satuan <x-required /></label>
                        <input type="text" id="unit" name="unit" class="form-control" placeholder="Enter unit"
                            value="{{ old('unit') }}">
                        <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="image" class="form-label">Gambar <x-required /></label>
                        <input type="file" id="image" name="image" class="form-control" placeholder="Enter Image"
                            value="{{ old('image') }}">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="card-text h-full space-y-4">
                        <div class="input-area">
                            <label for="description" class="form-label">Deskripsi <x-required /></label>
                            <textarea id="description" name="description" class="form-control" rows="5" placeholder="Text Area">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    <div class="checkbox-area">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="hidden" name="is_stock" value="1">
                            <span
                                class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                    transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                <img src="{{ asset('backend/images/icon/ck-white.svg') }}" alt=""
                                    class="h-[10px] w-[10px] block m-auto opacity-0">
                            </span>
                            <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">Stok?</span>
                        </label>
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
