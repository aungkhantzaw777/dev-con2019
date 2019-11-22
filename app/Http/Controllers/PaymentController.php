<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Ticket};
use App\AuthenticatesUser;
use Auth;

class PaymentController extends Controller
{
    protected $request;
    protected $order_id;
    
    public function __construct(Request $request)
    {
        $this->request = $request;

    }

   
    
    public function payment()
    {
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
  
        return view('pages.payment')->with([
            'merchant_id' => $merchant_id,
            'payment_description' => $payment_description,
            'payment_url' => $payment_url,
            'result_url_1' => $result_url_1,
            'version' => $version,
            'currency' => $currency,
            'payment_description' => $payment_description,
            'amount' => $amount,
            'order_id' => $order_id,
            'hash_value' => $hash_value
        ]);
    }
    
    public function paymentResponse(Request $request) 
    {
        
        $user = session('user');
        $user['study_place'] = implode(",",$user['study_place']);
        $user['previous_year'] = implode(",",$user['previous_year']);
        $user['about_devcon'] = implode(",",$user['about_devcon']);
        $user['admin'] = 0;
        $user = User::create($user);
        $ticket = Ticket::create([
            'user_id' => $user->id,
            'ticket_id' => 'DC9-'.$request->order_id.'12',
            'sale_online' => 1
        ]);
        return redirect()->intended('/login');
    }
    
    protected function user($user)
    {
        
        return user::create($user);
    }

}
