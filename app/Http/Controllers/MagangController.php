<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan; // Sesuaikan dengan model yang Anda gunakan
use App\Models\User;

class MagangController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_type');
    }

    // public function index(Request $request)
    // {
    //     return view('auth.datamagang');
    // }

    public function magang(Request $request)
    {
        if($request->has('search')){
            $data = User::where('user_type', 'Magang')
                        ->where('name', 'like', '%' . $request->search . '%')
                        ->paginate(5);
        } else {
            $data = User::where('user_type', 'Magang')->paginate(5);
        }

        return view('auth.datamagang', ['data' => $data]);
    }

    // Metode untuk memperbarui data karyawan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'jabatan' => 'required|string|max:255',
        ]);

        // Temukan data karyawan berdasarkan ID
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }

        // Perbarui data karyawan
        $karyawan->nama = $request->input('nama');
        $karyawan->email = $request->input('email');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->save();

        return response()->json(['message' => 'Data Magang berhasil diperbarui', 'Magang' => $karyawan], 200);
    }

    // Metode untuk menghapus data karyawan
    public function destroy($id)
    {
        // Temukan data karyawan berdasarkan ID
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }

        // Hapus data karyawan
        $karyawan->delete();

        return response()->json(['message' => 'Data karyawan berhasil dihapus'], 200);
    }
}
