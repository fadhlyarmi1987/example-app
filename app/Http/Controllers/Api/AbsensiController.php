<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListAbsen;

class AbsensiController extends Controller
{
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
        $listAbsen->name = $request->input('name');
        $listAbsen->typetime = $request->input('typetime');
        $listAbsen->time = $time;
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

    public function listabsen()
    {
        $listabsen = ListAbsen::all();
        return response()->json($listabsen);
    }

    public function userid(Request $request)
{
    $userid = $request->query('userid');

    $listabsen = ListAbsen::where('userid', $userid)->get();
    return response()->json($listabsen);
}

    public function listAbsenByIdUser($id)
    {
        $listabsen = ListAbsen::orderBy('time', 'DESC')->where('name', $id)->get();
        return response()->json($listabsen);
    }

}
