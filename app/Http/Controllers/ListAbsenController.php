<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListAbsen; // Pastikan Anda membuat model untuk tabel ini

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
            'userid' => 'required|string|max:255',
            'typetime' => 'required|string|max:255',
            'time' => 'required|date_format:Y-m-d H:i:s',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'kantorid' => 'required|integer'
        ]);

        // Simpan data
        $listAbsen = new ListAbsen();
        $listAbsen->userid = $request->input('userid');
        $listAbsen->typetime = $request->input('typetime');
        $listAbsen->time = $request->input('time');
        $listAbsen->latitude = $request->input('latitude');
        $listAbsen->longitude = $request->input('longitude');
        $listAbsen->kantorid = $request->input('kantorid');
        $listAbsen->save();

        // Response
        return response()->json([
            'message' => 'Data successfully saved',
            'data' => $listAbsen
        ], 201);
    }

    public function show(Request $request)
    {
        $userid = $request->query('userid');

        if ($userid) {
            $absen = ListAbsen::where('userid', $userid)->get();
            if ($absen->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }
        } else {
            $absen = ListAbsen::all();
        }

        return response()->json($absen, 200);
    }
}
