<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('auth.notif', compact('notifications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengumuman' => 'required|string',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification created successfully.');
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pengumuman' => 'required|string',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully.');
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
