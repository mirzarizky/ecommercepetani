@extends('seller.seller_template')

@section('main')
<div class="flex flex-wrap items-center justify-between mb-6">
    <h4
        class="flex inline-block mb-4 space-x-3 text-xl font-medium capitalize lg:text-2xl text-slate-900 ltr:pr-4 rtl:pl-4 sm:mb-0 rtl:space-x-reverse">
        Dashboard</h4>
</div>
<div class="grid grid-cols-12 gap-5 mb-5">
    <div class="col-span-12 lg:col-span-12">
        <div class="p-4 card">
            <div class="grid col-span-1 gap-4 md:grid-cols-3">

                <!-- BEGIN: Group Chart2 -->
                <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 ">
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                        <div class="flex-1">
                            <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                Total Uang
                            </div>
                            <div class="text-lg font-medium text-slate-900 dark:text-white">
                                Rp. {{ number_format($totalMoney) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900	 ">
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                        <div class="flex-1">
                            <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                Total Pendapatan Bulan Ini
                            </div>
                            <div class="text-lg font-medium text-slate-900 dark:text-white">
                                Rp. {{ number_format($totalThisMonth) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900	 ">
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                        <div class="flex-1">
                            <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                Total Produk Terjual
                            </div>
                            <div class="text-lg font-medium text-slate-900 dark:text-white">
                                {{ number_format($sellProduct) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END: Group Chart2 -->
            </div>
        </div>
    </div>
</div>

<div class="card">
    {!! $chart->container() !!}
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
@endpush
