<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.v_login');
    }

    public function postLogin(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back();
        } else {
            if (Auth::attempt(['role' => 2, 'password' => $request->password])) {
                return redirect('pt_delaval');
            } else {
                return redirect('/');
            }
        }

        return redirect('/');
    }

    public function getRegister()
    {
        return view('auth.v_register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', //field_confirmation

        ]);

        //$validator = Validator::make($request->all($valid),);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($valid)->withInput($request->all);
        // } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => '2',
                'password' => bcrypt($request->password)
            ]);

            return redirect()->route('login')->with('pesan', 'Register Berhasil !!');
        // }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
