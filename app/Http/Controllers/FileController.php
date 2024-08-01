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
        $file = File::find($id);

        if (!$file) {
            abort(404);
        }

        $filePath = storage_path('app/public/' . $file->path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        abort(404);
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