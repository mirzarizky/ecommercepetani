@extends('customer.customer_template')

@section('main')
@include('customer.partials.breadcrumb')
<div class="card">
    <div class="flex flex-col p-6 card-body">
        <header class="flex items-center px-6 pb-5 mb-5 -mx-6 border-b border-slate-100 dark:border-slate-700">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
            </div>
        </header>
        @include('customer.partials.alert')
        <div class="h-full card-text ">
            <form class="space-y-4" method="POST" action="{{ route('customer.order.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" id="total_price" name="total_price" class="form-control" placeholder="Total Price" value="{{ $total_price }}" readonly>
                <div class="relative input-area">
                    <label for="total" class="form-label">Price</label>
                    <input type="text" id="total" name="total" class="form-control" placeholder="Total Price" value="Rp. {{ number_format($total_price) }}" readonly>
                    <x-input-error :messages="$errors->get('total')" class="mt-2" />
                </div>

                <div class="">
                    <label for="payment_method_id" class="form-label">Payment Method <x-required /></label>
                    <select name="payment_method_id" id="payment_method_id" class="w-full py-2 mt-2 select2 form-control">
                        @foreach ($paymentMethods as $payment)
                        <option value="{{ $payment->id }}" {{ $payment->id === old('payment_method_id') ? 'selected' : '' }} class="inline-block text-sm font-normal font-Inter text-slate-600">
                            @if ($payment->rekening === 'cod')
                            {{ $payment->bank_name }}

                            @elseif ($payment->rekening === 'delivery')
                            {{ $payment->bank_name }}
                            @elseif ($payment->rekening === 'pickup')
                            {{ $payment->bank_name }}
                            @else
                            {{ $payment->bank_name . ' - ' . $payment->rekening . ' A/N ' . $payment->username }}
                            @endif
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="payment_method_id" class="form-label">Delivery <x-required /></label>
                    <select name="delivery" id="" class="w-full py-2 mt-2 select2 form-control">
                        <option value="delivery">Antar Ke Alamat</option>
                        <option value="pickup">Ambil di Tempat</option>
                    </select>
                </div>


                <div class="relative mb-3 input-area">
                    <label for="payment_proof" class="form-label">Payment Proof (Opsional jika COD)</label>
                    <input type="file" id="payment_proof" name="payment_proof" class="form-control" placeholder="Total Price" value="{{ old('payment_proof') }}">
                    <x-input-error :messages="$errors->get('payment_proof')" class="mt-2" />
                </div>

                <hr />

                <div class="input-area">
                    <label for="address" class="form-label">Nama Jalan</label>
                    <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="other_detail" class="form-label">Detail Lainnya</label>
                    <input type="text" name="other_detail" class="form-control" id="other_detail" placeholder="">
                    <x-input-error :messages="$errors->get('other_detail')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <input type="text" name="province" class="form-control" id="province" placeholder="">
                    <x-input-error :messages="$errors->get('province')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Kota/Kabupaten</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="">
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="">
                    <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="zip_code" class="form-label">Kode POS</label>
                    <input type="number" name="zip_code" class="form-control" id="zip_code" placeholder="">
                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                </div>

                @if ($total_price > 0)
                <button class="inline-flex justify-center btn btn-dark">Submit</button>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection