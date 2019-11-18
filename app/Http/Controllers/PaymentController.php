<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AuthenticatesUser;
use Auth;

class PaymentController extends Controller
{
    protected $request;
    
    
    public function __construct(Request $request)
    {
        $this->request = $request;

        \View::share([
            'merchant_id' => "104104000000326",
            'version' => '8.5',
            'currency' => '702', 
            'result_url_1' => 'http://localhost:8000',
            'hash_value' => $this->hash_value(),
            'payment_description' => 'Early Birth Ticket',
            'order_id' => '2393223',
            'amount' => 000000002500,
            'payment_url' => 'https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment'
        ]);
    }
    
    public function payment123()
    {
        return view('pages.payment');
    }
    
    public function servies123()
    {   
        $user = (object)session('user');
        
        
        return 'work1';
    }
    protected function user($user)
    {
        
        return user::create($user);
    }
    protected function hash_value()
    {
        //Merchant's account information
        $merchant_id = "104104000000326";			//Get MerchantID when opening account with 2C2P
        $secret_key = "4DA01BF6B855216C25CE583C599EE605B9CF913EB0CC28214D5D5D175559E6FE";	//Get SecretKey 
        
        //Transaction information
        $payment_description  = 'Early Birth Ticket';
  
        $currency = "702";
        $amount  = 000000002500;
        
        //Request information
        $version = "8.5";	
        $payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
        $result_url_1 = "http://localhost:70/payment/result.php";
        
        //Construct signature string
        $params = $version.$merchant_id.$payment_description.$currency.$amount.$result_url_1;
        return  hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value
    }
}
