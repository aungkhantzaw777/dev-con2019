@extends('layouts.master')

@section('title')
Payment Transaction
@endsection

@section('content')



<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(/img/bg-img/pre.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="page-title">Payment</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login to your account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<!-- Login Area Start -->
<section class="section-padding-100-0 payment-wrap">
    <div class="container">
        
        <div class="row">
            <div class="col-md-4 text-center">
                <a href="/home">
                    <div class="card p-3 cursor-pointer">
                        <div class="card-body">
                            <div class="img-wrap mx-auto">
                                <img class="W-100" src="{{asset('img/payment/mpu.png') }}" alt="123">
                            </div>
                            <span>MPU</span>
                        </div>
                    </div>
                </a>
                
            </div>
            <div class="col-md-4  text-center">
                <a href="/home">
                    <div class="card p-3 cursor-pointer">
                        <div class="card-body">
                            <div class="img-wrap mx-auto">
                                <img class="W-100" src="{{asset('img/payment/123.png') }}" alt="123">
                            </div>
                            <span>123 Services Over Counter</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4  text-center">
                <a href="#">
                    <div class="card cursor-pointer p-3">
                        <div class="card-body">
                            <div class="img-wrap mx-auto">
                                <img class="W-100" src="{{asset('img/payment/visa.png') }}" alt="visa">
                            </div>
                            <span>Visa</span>
                        </div>
                    </div>
                </a>
            </div>


        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <span class="payment-heading">Bank Channel</span>
                
            </div>
            <div class="col-md-2 col-xs-4 col-4">
                <div class="img-agent-wrap">
                    <img class="W-100" src="{{ asset('img/payment/aya_bank.png') }}" alt="Aya Bank">
                </div>
            </div>
            <div class="col-md-2 col-xs-4 col-4">
                <div class="img-agent-wrap">
                    <img class="W-100" src="{{ asset('img/payment/cb_bank.png') }}" alt="CB Bank">
                </div>
            </div>
            <div class="col-md-2 col-xs-4 col-4">
                <div class="img-agent-wrap">
                    <img class="W-100" src="{{ asset('img/payment/kbz_bank.png') }}" alt="KBZ Bank">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-md-12">
                <span class="payment-heading">Counter Agent</span>
            </div> --}}
            <div class="col-md-2 col-xs-4 col-3">
                    <form action='{{ config('laravel-2c2p.access_url') }}' method='POST' name='paymentRequestForm'>
                            Processing payment request, Do not close the browser, press back or refresh the page.
                            <input type="hidden" name="result_url_1" value="{{config('laravel-2c2p.result_url_1') }}">
                            <input type="hidden" name="paymentRequest" value="{{ $payload }}">
                        </form>
                        <script language="JavaScript">
                            document.paymentRequestForm.submit();
                        </script>
                
            </div>
        </div>

    </div>
</section>
<!-- Login Area End -->
@endsection