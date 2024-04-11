@extends('customer.customer_template')

@section('main')
@include('customer.partials.breadcrumb')
<div class="card">
    <div class="flex flex-col p-6 card-body">
        <header class="flex items-center px-6 pb-5 mb-5 -mx-6 border-b border-slate-100 dark:border-slate-700">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Kirim ke Alamat</div>
            </div>
        </header>
        @include('customer.partials.alert')
        <div class="h-full card-text ">
            <form class="space-y-4" method="POST" action="{{ route('customer.address.new', $order_id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order_id }}" readonly>
                <div class="input-area">
                    <label for="address" class="form-label">Nama Jalan</label>
                    <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="other_detail" class="form-label">Detail Lainnya</label>
                    <input type="text" name="other_detail" class="form-control" id="other_detail" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <input type="text" name="province" class="form-control" id="province" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Kota/Kabupaten</label>
                    <input type="text" name="province" class="form-control" id="city" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="province" class="form-control" id="kecamatan" placeholder="" required>
                </div>

                <button type="submit" class="inline-flex justify-center btn btn-dark">Submit</button>

            </form>
        </div>
    </div>
</div>
@endsection