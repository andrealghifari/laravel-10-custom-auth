<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'string|required|email|',
            'password' => 'string|required'
        ]);
        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::DASHBOARD)->with('success', 'Successfully Loged In!');
        }else{
            return redirect()->route('login')->withErrors(['error'=> 'Invalid email or Password']);
        }
    }
    public function registerPage(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:10', 'unique:users, username', 'alpha_num'],
            'email' => ['required', 'string', 'email', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);    
        Auth::login($user);
        // return redirect(RouteServiceProvider::DASHBOARD);
        return redirect()->route('dashboard')->with('success', 'Registration Successful!');
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
