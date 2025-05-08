<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerPost(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:pasiens',
        'nik' => 'required|unique:pasiens|numeric|max_digits:16|min_digits:16',
        'jenis_kelamin' => 'required',
        'password' => 'required'
    ], [
        'name.required' => 'Wajib mengisi Nama Lengkap!',
        'email.required' => 'Wajib mengisi Email!',
        'email.unique' => 'Email ini sudah digunakan oleh pasien lain!',
        'nik.required' => 'Wajib mengisi NIK!',
        'nik.numeric' => 'NIK tidak dapat berisi huruf!',
        'nik.max_digits' => 'NIK tidak dapat lebih dari 16 digit!',
        'nik.min_digits' => 'NIK tidak dapat kurang dari 16 digit!',
        'nik.unique' => 'NIK ini sudah digunakan oleh pasien lain!',
        'password.required' => 'Wajib mengisi Password!',
    ]);

    // Create the pasien with hashed password
    Pasien::create([
        'name' => $request->name,
        'email' => $request->email,
        'nik' => $request->nik,
        'jenis_kelamin' => $request->jenis_kelamin,
        'password' => Hash::make($request->password)
    ]);

    return back()->with('success', 'Register Berhasil');
}

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
