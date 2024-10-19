<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    // Display login form
    public function index()
    {
        return view('auth.login');
    }

    // Handle login attempt with role-based redirection
    public function customLogin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect('/admin/transports')->withSuccess('Signed in as admin');
            }
            return redirect('/')->withSuccess('Signed in as user');
        }

        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }

    // Display registration form
    public function registration()
    {
        return view('auth.registration');
    }

    // Handle registration and login with role-based redirection
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Collect and process the data from the request
        $data = $request->all();
        $user = $this->create($data);

        // Log the user in after registration
        Auth::login($user);

        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect('/admin/transports')->withSuccess('You have signed in as an admin.');
        }

        return redirect('/')->withSuccess('You have signed in as a user.');
    }

    // Create new user and assign default role
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'user',  // Default role as 'user'
        ]);
    }

    // Display dashboard for logged-in users
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    // Log out and flush session
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
