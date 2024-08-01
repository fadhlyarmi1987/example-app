<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function karyawan() {
        return view('auth.datakaryawan');
    }

    public function magang() {
        return view('auth.datamagang');
    }

    public function absen() {
        return view('auth.absen');
    }

    public function tugas() {
        return view('auth.tugas');
    }

    public function Notif() {
        return view('auth.notif');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:employee,intern',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }

}
