<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);

        return response()->json(['success' => 'File berhasil diunggah']);
    }

    public function unduh($filename)
    {
        $path = storage_path('app/public/' . $filename);

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            abort(404);
        }
    }

    public function hapus($filename)
    {
        $path = 'public/' . $filename;

        if (Storage::exists($path)) {
            Storage::delete($path);
            return response()->json(['success' => 'File berhasil dihapus'], 200);
        } else {
            return response()->json(['error' => 'File tidak ditemukan'], 404);
        }
    }

    public function fileList()
    {
        $files = Storage::files('public');
        $fileList = array_map(function($file) {
            return [
                'name' => basename($file),
                'uploaded_at' => Storage::lastModified($file)
            ];
        }, $files);

        return response()->json(['files' => $fileList]);
    }
}
