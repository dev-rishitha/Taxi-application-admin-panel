<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin-login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Check if admin exists in 'admins' table
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Login successful
            $request->session()->regenerate();
            Session::put('admin_logged_in', true);
            Session::put('admin_username', $admin->username);
            return redirect('/admin/dashboard')->with('success', 'Logged in successfully!');
        }

        // If credentials are invalid
        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput();
    }

    // Handle logout
    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_username');
        return redirect('/admin/login')->with('success', 'Logged out successfully!');
    }
}
