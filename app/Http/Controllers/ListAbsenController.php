<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListAbsen;

class ListAbsenController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'typetime' => 'string|max:255',
            'time' => 'date_format:Y-m-d H:i:s',
            'latitude' => 'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
            'kantorid' => 'string|max:255'
        ]);

        $time = date('Y-m-d H:i:s');

        // Simpan data
        $listAbsen = new ListAbsen();
        $listAbsen->name = $request->input('name');
        $listAbsen->typetime = $request->input('typetime');
        $listAbsen->time = $time;
        $listAbsen->latitude = $request->input('latitude');
        $listAbsen->longitude = $request->input('longitude');
        $listAbsen->kantorid = $request->input('kantorid');
        $listAbsen->role = $request->input('role');
        $listAbsen->save();

        // Response
        return response()->json([
            'message' => 'Data successfully saved',
            'data' => $listAbsen
        ], 201);
    }

    public function show(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $userid = $request->query('userid');

        if ($date) {
            $absen = ListAbsen::whereDate('time', $date)->get();
            if ($absen->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }
        } else {
            $absen = ListAbsen::all();
        }

        return response()->json($absen, 200);
    }
}
