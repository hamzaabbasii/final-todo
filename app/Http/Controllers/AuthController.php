<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth\login-page');
    }
    public function login(Request $request)
    {
        $credentials = $request -> validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',
        ]);

        if(Auth::attempt($credentials, $request->remember))
        {
            return redirect()->intended(route('newtask.add'));
        }
        else
        {
            return redirect()->back()->withErrors(['email'=>'Invalid credentials']);
        }
    }

    public function showSignupForm()
    {
        return view('auth\signup-page');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        Auth::login($user);
        
        return redirect()->route('login');
    }

}
