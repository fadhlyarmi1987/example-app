<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listabsen;

class AbsensiController extends Controller
{
    public function listabsen()
    {
        $listabsen = Listabsen::all();
        return response()->json($listabsen);
    }

    public function userid(Request $request)
{
    $userid = $request->query('userid');

    $listabsen = Listabsen::where('userid', $userid)->get();
    return response()->json($listabsen);
}

}
