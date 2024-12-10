<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
   
    public function showLoginForm()
    {
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect()->route('dashboard');
        }
       

 
        return back()->withErrors(['error' => 'Email hoặc mật khẩu không đúng.']);
    }
    public function dashboard()
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        return view('dashboard', ['user' => session('user')]);
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
