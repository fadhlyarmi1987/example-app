<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{

// API Methods
    public function apiIndex()
    {
        $files = File::all();
        return response()->json($files);
    }

    public function apiDownload($id)
    {
        $file = File::find($id);

        if (!$file) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        $path = storage_path('app/' . $file->path);

        if (!file_exists($path)) {
            return response()->json(['error' => 'File not found on server.'], 404);
        }

        return response()->download($path, $file->name);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,txt'
        ]);

        $file = $request->file('file');
        $filePath = $file->store('uploads');

        $newFile = File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $filePath,
        ]);

        return response()->json(['success' => true, 'file' => $newFile]);
    }

    public function apiDestroy($id)
    {
        $file = File::findOrFail($id);
        Storage::delete($file->path);
        $file->delete();

        return response()->json(['success' => true]);
    }
}
