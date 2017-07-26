<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index() {
        if (Auth::check()) {
            // Authentication passed...
            if(Auth::user()->role == 2) {
            return redirect()->intended('welcome');
            }else {
                echo "Admin page is still developing";
            }
        } else {
            return redirect('signin');
        }
    }
    //logging in
    public function login(Request $request) {
         if (Auth::attempt(['email'=>$request->email,"password"=>$request->pass])) {
//             if(Auth::user()->role == 2) {
                return redirect("/");
         } else {
              return redirect('/signin')->with("message","Incorrect Password or username");
         }
    }
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
