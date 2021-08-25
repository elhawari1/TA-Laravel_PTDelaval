<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.v_login1');
    }

    public function postLogin(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('pesan', 'Silahkan masukkan kembali email dan password anda');
        } else {
            if (Auth::attempt(['role' => 2, 'password' => $request->password])) {
                return redirect('/');
            } else {
                return redirect('admin');
            }
        }
    }

    public function getRegister()
    {
        return view('auth.v_register1');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', //field_confirmation

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => '2',
            'password' => bcrypt($request->password)
        ]);

        // mengirimkan email verifikasi
        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Register Berhasil, silahkan cek email anda');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function getEmailVerificationNotify(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return view('auth.v_verifyemail');
    }

    public function getEmailVerificationLink(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function postVerificationSend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Email verifikasi sudah terkirim');
    }

    public function getPasswordRequest()
    {
        return view('auth.v_forgotpassword');
    }

    public function postPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
    }

    public function getPasswordReset(Request $request, $token)
    {
        return view('auth.v_resetpassword', ['request' => $request]);
    }

    public function postPasswordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::default()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confrimation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
