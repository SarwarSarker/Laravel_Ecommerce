<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\VerifyRegistration;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->redirectTo = url()->previous();
    }
    // public function showLoginForm()
    // {
    //     if(!session()->has('url.intended'))
    //     {
    //         session(['url.intended' => url()->previous()]);
    //     }
    //     return view('auth.login');
    // }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        

        //Find User
        $user = User::where('email',$request->email)->first();
        if(!is_null($user)){
        if($user->status == 1){
            //Login this user
             if(Auth::guard('web')->attempt(['email'=> $request->email,'password'=> $request->password ],$request->remember)){
                    //Login him now
                    return redirect()->intended(route('index'));
             }else{
                session()->flash('error',' Email or Password is Incorrect');
                return redirect()->route('login');
            }
        }else{
            ///Send him a token again 
            if(!is_null($user)){
                $user->notify(new VerifyRegistration($user)); 
                $notification = array(
                    'message' => 'A new confirmation message has sent to you . Please check and Verify..', 
                    'alert-type' => 'success'
                  );
                return redirect('/')->with($notification);
            }else{
              
                $notification = array(
                    'message' => 'Please Login first.', 
                    'alert-type' => 'error'
                  );
                  return redirect()->route('login')->with($notification);

                // session()->flash('error',' Please Login first.');
                // return redirect()->route('login');
            }
        }
    }else{
        $notification = array(
            'message' => 'Please Register first.', 
            'alert-type' => 'error'
          );
          return redirect()->route('register')->with($notification);
    }
    }
    
}
