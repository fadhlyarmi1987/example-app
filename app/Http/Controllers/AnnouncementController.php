<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('auth.notif', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengumuman' => 'required',
        ]);

        Announcement::create([
            'pengumuman' => $request->pengumuman,
            'tanggal_unggah' => now(),
        ]);

        return redirect()->route('notifications.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pengumuman' => 'required|string',
            'tanggal_unggah' => 'required|date',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'pengumuman' => $request->pengumuman,
            'tanggal_unggah' => $request->tanggal_unggah,
        ]);

        return response()->json(['message' => 'Announcement updated successfully']);
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return response()->json(['message' => 'Announcement deleted successfully']);
    }
}
