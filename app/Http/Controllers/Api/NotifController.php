<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    public function store(Request $request)
    {
        $notification = Notification::create([
            'pengumuman' => $request->pengumuman,
        ]);

        return response()->json($notification, 201);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update([
            'pengumuman' => $request->pengumuman,
        ]);

        return response()->json($notification);
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json(null, 204);
    }
}
