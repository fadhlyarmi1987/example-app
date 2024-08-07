<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListAbsen;

class AbsensiController extends Controller
{
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

}
