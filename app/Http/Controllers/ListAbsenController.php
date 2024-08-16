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
            //'userid' => ['numeric','not_in:0'],
            'name' => 'string|max:255',
            'typetime' => 'string|max:255',
            'time' => 'date_format:Y-m-d H:i:s',
            'latitude' => 'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
            'kantorid' => 'string|max:255'
        ]);

        $time = date('Y-m-d H:i:s');

        // Simpan data
        $listAbsen = new ListAbsen();
        $listAbsen->userid = $request->input('userid');
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

        if ($request) {
            $absen = ListAbsen::whereDate('time', $request)->get();
            if ($absen->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }
        } else {
            $absen = ListAbsen::all();
        }

        return response()->json($absen, 200);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'new_name' => 'required|string|max:255',
        ]);

        // Ambil nilai yang ada dan yang baru dari request
        $oldName = $request->input('name');
        $newName = $request->input('new_name');

        // Temukan entri dengan nama lama dan perbarui nama menjadi nama baru
        $updatedRows = ListAbsen::where('name', $oldName)
            ->update(['name' => $newName]);

        if ($updatedRows === 0) {
            return response()->json(['message' => 'Data tidak ditemukan atau sudah diperbarui'], 404);
        }

        // Response
        return response()->json([
            'message' => 'Data successfully updated',
            'updated_count' => $updatedRows
        ], 200);
    }
}
