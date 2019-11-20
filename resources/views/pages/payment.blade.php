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
                    <?php 
	//Merchant's account information
	$merchant_id = "104104000000326";			//Get MerchantID when opening account with 2C2P
	$secret_key = "4DA01BF6B855216C25CE583C599EE605B9CF913EB0CC28214D5D5D175559E6FE";	//Get SecretKey from 2C2P PGW Dashboard
	
	//Transaction information
	$payment_description  = 'Ticket';
	$order_id  = time();
	$currency = '104';
	$amount  = '000000010000';
	
	//Request information
	$version = "8.5";	
	$payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
	$result_url_1 = "http://localhost:8000/payment/result";
	
	//Construct signature string
	$params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
	$hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value
	
	echo 'Payment information:';
	echo '<html> 
	<body>
	<form id="myform" method="post" action="'.$payment_url.'">
		<input type="hidden" name="version" value="'.$version.'"/>
		<input type="hidden" name="merchant_id" value="'.$merchant_id.'"/>
		<input type="hidden" name="currency" value="'.$currency.'"/>
		<input type="hidden" name="result_url_1" value="'.$result_url_1.'"/>
		<input type="hidden" name="hash_value" value="'.$hash_value.'"/>
    PRODUCT INFO : <input type="text" name="payment_description" value="'.$payment_description.'"  readonly/><br/>
		ORDER NO : <input type="text" name="order_id" value="'.$order_id.'"  readonly/><br/>
		AMOUNT: <input type="text" name="amount" value="'.$amount.'" readonly/><br/>
		<input type="submit" name="submit" value="Confirm" />
	</form>  
	
	<script type="text/javascript">
		document.forms.myform.submit();
	</script>
	</body>
	</html>';	?>
                
                
            </div>
        </div>

    </div>
</section>
<!-- Login Area End -->
@endsection