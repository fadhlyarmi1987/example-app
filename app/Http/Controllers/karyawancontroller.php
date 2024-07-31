<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan; // Sesuaikan dengan model yang Anda gunakan

class KaryawanController extends Controller
{
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

        return response()->json(['message' => 'Data karyawan berhasil diperbarui', 'karyawan' => $karyawan], 200);
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

