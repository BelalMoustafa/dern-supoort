<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }
    public function registerPost(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
        if ($emailExists) {
            return back()->with('error', 'Email already exists');
        }
        if ($request->role === 'admin' && $request->admin_input != 'admin_code_hamza') {
            return back()->with('error', 'Admin code is invalid');
        }
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->save();
        return back()->with('success', 'Register successfully');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin-home')->with('success', 'Login Success');
            } else {
                return redirect()->route('user-home', ['id' => $user->id])->with('success', 'Login Success');
            }
        }
        return back()->with('error', 'Error Email or Password');
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.edit-profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
