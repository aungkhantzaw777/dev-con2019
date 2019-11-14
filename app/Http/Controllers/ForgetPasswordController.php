<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\{ForgetPassword};
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    protected $request = '';

    public function __construct(Request $request)
    {
        return $this->request = $request;
    }

    public function forget()
    {
        return view('pages.forget-password');
    }

    public function postForget()
    {
        $user = User::byEmail($this->request->email);
        $user->password_code = $user->id.''.str_random(60);
        $user->update();
        \Mail::to($user->email)->queue(new ForgetPassword($user));
        
        return 'Please Check Your Gmail';
    }

    public function reset($auth)
    {
        $user = User::where('password_code', $auth)->first();
        if(!$user)
            abort('401');
        return view('pages.reset-password')->withUser($user);
    }

    public function postReset()
    {
        $attribute = request()->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'auth' => 'required'
        ]);
    

        $user = User::where('password_code', $attribute['auth'])->first();
        $user->password = Hash::make($user->password);
        $user->update();
        return redirect()->intended('/login');
    }
}
