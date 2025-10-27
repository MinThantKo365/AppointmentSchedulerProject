<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login_view');
        }
        return view('app.index');
    }

    public function loginView()
    {
        return view('app.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect('/home');
        } else {
            return back()->withErrors(['errors' => 'email or password is invalid.']);
        }
    }


    public function registerView()
    {
        return view('app.register');
    }

    public function registerPost(RegisterRequest $request)
    {
        $data['name']     = $request->name;
        $data['email']    = $request->email;
        $data['password'] = Hash::make($request->password);
        $user             = User::create($data);

        if ($user) {
            return redirect()->route('login_view')->with('success', 'Registration was successful, please login.');
        }
        return back()->withErrors(['errors' => 'Registration failed, please try again.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
