<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    // protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::guard("student")->attempt($credentials))
        {
            $request->session()->regenerate();
          
            return redirect("/course");
        }
        else if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        
    }
    public function logout(Request $request)
    {
        if(Auth::guard("student")->check())
        {
            Auth::guard("student")->logout();
        }else{
            Auth::logout();

        }
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect("/login");
    }
    protected function authenticated(Request $request, $user)
    {
        // if($user->hasRole('admin')){
        //     return redirect()->route('home');
        // }
        // return redirect(route('dashboard'));
        
    }
    
}
