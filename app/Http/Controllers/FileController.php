<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('auth.tugas', compact('files'));
    }

    public function download($id)
    {
        // Cari file berdasarkan ID
        $file = File::find($id);
        
        // Jika file tidak ditemukan, kembalikan respons error
        if (!$file) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    
        // Dapatkan path file dari penyimpanan
        $path = storage_path('app/' . $file->path); // Sesuaikan dengan cara Anda menyimpan file
        
        // Periksa apakah file benar-benar ada di path tersebut
        if (!file_exists($path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di server.');
        }
    
        // Kembalikan response untuk mengunduh file
        return response()->download($path, $file->name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,txt'
        ]);

        $file = $request->file('file');
        $filePath = $file->store('uploads');

        File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $filePath,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);
        Storage::delete($file->path);
        $file->delete();

        return response()->json(['success' => true]);
    }

    

}