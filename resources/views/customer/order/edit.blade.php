@extends('customer.customer_template')

@section('main')
    @include('customer.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            @include('customer.partials.alert')
            <div class="card-text h-full mb-15">
                <form class="space-y-4" method="POST" action="{{ route('customer.order.update', $order->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-text h-full space-y-4">
                        <div class="input-area">
                            <label for="comment" class="form-label">Comment <x-required /></label>
                            <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Text Area">{{ old('comment') }}</textarea>
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>


                </form>
            </div>
        </div>
    </div>
@endsection
