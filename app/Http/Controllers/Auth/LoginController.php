<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\AnotherEmail;
use Hash;
use DB;
use App\Models\User;

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
     
     
     public function login(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->count();
        if ($user > 0) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect('dashboard');
        } else {
            $user = DB::table('another_emails')->where('email', $request->email)->count();
            if ($user > 0) {
                $user = DB::table('another_emails')->where('another_emails.email', $request->email)->join('users', 'users.id', 'another_emails.user_id')->select('users.email', 'another_emails.is_verified')->first();
                if ($user->is_verified == 'verified') {
                    Auth::attempt(['email' => $user->email, 'password' => $request->password]);
                } else {
                    return redirect()->back()->withError('Please Verify your email first !');
                }
                return redirect('dashboard');
            } else {
                return redirect()->back()->withError('Email not found');
            }
        }
    }
     
        protected function authenticated(Request $request, $user)
    {
        if($user->status == "active"){
            return redirect('/dashboard ');
        }
        else if((Auth::user()->mobile_no == '') && (Auth::user()->status == 'pending'))
        {
            return redirect('/welcome/phone');
        }
          else if(($user->dob == "") && (Auth::user()->status == 'pending')){
            return redirect('/details');
        }
        else if(($user->img == "") && (Auth::user()->status == 'pending')){
            return redirect('/profile-upload');
        }
         else if(($user->description == "") && (Auth::user()->status == 'pending')){
            return redirect('/description');
        }
        else if ($user->verify_email == 1 && $user->status == "pending") {
            return redirect('/welcome/phone');
        }
        else if ($user->status == "pending") {
            return redirect('/welcome/email');
        } else if($users){
             return redirect('/dashboard ');
        }else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
    }
     
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
