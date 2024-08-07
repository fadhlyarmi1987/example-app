<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function apiIndex()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    // Metode untuk membuat notifikasi baru
    public function apiStore(Request $request)
    {
        $request->validate([
            'pengumuman' => 'required|string',
        ]);

        $notification = Notification::create($request->all());
        return response()->json($notification, 201);
    }

    // Metode untuk mengupdate notifikasi yang ada
    public function apiUpdate(Request $request, $id)
    {
        $request->validate([
            'pengumuman' => 'required|string',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($request->all());
        return response()->json($notification);
    }

    // Metode untuk menghapus notifikasi
    public function apiDestroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(null, 204);
    }
}
