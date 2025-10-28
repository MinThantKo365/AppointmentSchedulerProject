<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\forgetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ChangePwdRequest;
use App\Http\Requests\ResetPasswordRequest;



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
            return back()->with(['err' => 'Email or password is invalid.']);
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
        $data['role']     = 'user';
        $user             = User::create($data);

        if ($user) {
            return redirect()->route('login_view')->with('success', 'Registration was successful, please login.');
        }
        return back()->withErrors(['errors' => 'Registration failed, please try again.'])->withInput();
    }

    public function cp_index()
    {
        return view('app.change_pwd');
    }

    public function cpPost(ChangePwdRequest $request)
    {
        $data = $request->validated();

        /** @var \App\Models\User $user */

        $user = Auth::user();

        if (!Hash::check($data['cur_password'], $user->password)) {
            return back()->withErrors(['cur_password' => 'Your current password is incorrect.']);
        }

        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('cp_page')->with('success', 'Password changed successfully.');
    }


    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    public function unauthorizedAccess()
    {
        return view('error.error-401');
    }

    public function forgetPWd()
    {
        return view('app.forget_pwd');
    }

    public function forgotPwdPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && $user->account_status == 'suspended') {
            return back()->with('error', 'Your account has been suspended!');
        } else {
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);
            $email = $request->email;

            Mail::to($email)
                ->queue(new forgetPasswordMail($token, $email));

            return back()->with('success', 'We have e-mailed your password reset link!');
        }

        
    }

    public function displayResetPasswordForm($token, $email)
    {
        return view('app.reset_password', ['token' => $token, 'email' => $email]);
    }

    public function submitResetPassword(ResetPasswordRequest $request)
    {

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (! $updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login_view'))->with('success', 'Your password has been changed!');
    }
}
