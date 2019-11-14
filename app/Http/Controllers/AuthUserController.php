<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Ticket};
use App\AuthenticatesUser;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterForm;
use App\Mail\{UserRegister,TicketActivate};
use Faker\Factory as Faker;
use Auth;
use Illuminate\Validation\Rule;

class AuthUserController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    protected $request;

    public function __construct(Request $request)
    {
        // $this->middleware('auth');
        $this->request = $request;
    }


    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'           => 'required|email|exists:users|max:255',
            'password'           => 'required|string',
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            // Success
            return redirect()->intended('/profile');
        } else {
            // Go back on error (or do what you want)
            return redirect()->back()->withErrors(['login' => 'invalid username and password']);
        }
    }



    public function postActivate(RegisterForm $request)
    {

        $user = $this->request->all();
        $user['admin'] = false;
        $user['password'] = Hash::make($user['password']);

        # convert data
        $ticket_id = $user['ticket_id'];
        $user['study_place'] = implode(",",$user['study_place']);
        $user['previous_year'] = implode(",",$user['previous_year']);
        $user['about_devcon'] = implode(",",$user['about_devcon']);
        $user = User::create($user);

        Ticket::where('ticket_id',$ticket_id)->update(['user_id'=> $user->id]);
        \Mail::to($user->email)->queue(new TicketActivate($user));
        return redirect('/success');
    }

    public function postRegister(RegisterForm $request)
    {
        
        $user = $this->request->all();
        session()->put('user', $this->request->all());
        return redirect('payment');
        $user['admin'] = false;
        $user['password'] = Hash::make($request['password']);


        
        // $avaliable_ticket = Ticket::where('user_id', null)->where('sale_online', '1')->get();
        // if($avaliable_ticket->count() == 0) return  redirect('/register-your-ticket-process')->withErrors(['ticket_id' => 'Ticket is not avaliable in here!']);

        
        // $user['study_place'] = implode(",",$user['study_place']);
        // $user['previous_year'] = implode(",",$user['previous_year']);
        // $user['about_devcon'] = implode(",",$user['about_devcon']);

        
        // $user = User::create($user);
        // $ticket_id = Ticket::where('user_id',null)->where('sale_online','1')->first()->ticket_id;
        // Ticket::where('ticket_id',$ticket_id)->update(['user_id'=> $user->id]);


        // \Mail::to($user->email)->queue(new UserRegister($user));
        // return redirect()->intended('/login');
    }

    public function success(){
        return view('success');
    }

    public function activate()
    {
        $this->valiateTicket();
        $unAvaliableTicket = Ticket::alreadyActivate($this->request->ticket_id);
        if($unAvaliableTicket){
            return view('welcome')->withErrors(['ticket_id' => 'Ticket Alraeay Activate']);
        }else{

            $route = "/activateAccount/".$this->request->ticket_id;

            return redirect('/activate-your-ticket/'. $this->request->ticket_id);
        }
    }

    public function activateAccount()
    {

        $avaliable_ticket = Ticket::where('ticket_id', $this->request->ticket_id)->get()->first();
        if(!$avaliable_ticket) return abort(401);

        return view('pages.activate-ticket')
                ->with(['ticket_id' => $this->request->ticket_id]);
    }



    private function valiateTicket()
    {
        request()->validate([
            'ticket_id' => 'required|exists:tickets,ticket_id'
        ],[
            'ticket_id.required' => 'Please Fill Ticket ID!',
            'ticket_id.exists' => 'Invalid Ticket ID!'
        ]);
    }


}
