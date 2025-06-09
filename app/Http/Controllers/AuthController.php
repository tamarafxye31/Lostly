<?php

namespace App\Http\Controllers;
use App\Models\Admin; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard')
               ->with('success', 'You have successfully logged in!');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function showRegister()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins', // Changed to admins table
        'phone' => 'required|string|max:20',
        'password' => 'required|string|min:8', // Removed 'confirmed'
    ]);

    Admin::create([ // Changed to Admin model
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'password' => Hash::make($validatedData['password']),
    ]);

    return redirect()->route('login')->with('success', 'Registration successful!');
}

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/admin/login')
           ->with('status', 'You have been logged out!');
}
}