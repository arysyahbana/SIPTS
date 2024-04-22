<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function show()
    {
        return view('Auth.signup');
    }

    public function store(Request $request)
    {
        $store = new User();
        $token = hash('sha256', time());
        $store->token = $token;
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'hp' => 'required',
            'password' => 'required|confirmed'
        ]);

        $store->name = $request->name;
        $store->email = $request->email;
        $store->hp = $request->hp;
        $store->role = 'umum';
        $store->password = Hash::make($request->password);

        $verif_link = url('signup/verification/' . $token . '/' . $request->email);
        $subject = 'Verifikasi Email Akun';
        $message = 'klik link <a href="' . $verif_link . '">ini</a> untuk mengaktifkan akun anda';
        Mail::to($request->email)->send(new Websitemail($subject, $message));

        $store->save();
        return redirect()->route('signup')->with('success', 'check your email');
    }

    public function verif($token, $email)
    {
        $verif = User::where('token', $token)->where('email', $email)->first();

        if ($verif) {
            $verif->token = '';
            $verif->update();
            return redirect()->route('login-show')->with('success', 'verifikasi berhasil');
        } else {
            return redirect()->route('login-show')->with('success', 'verifikasi gagal');
        }
    }
}
