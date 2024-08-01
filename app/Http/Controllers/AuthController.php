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

    
}
