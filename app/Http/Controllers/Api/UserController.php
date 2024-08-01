<?php

namespace App\Http\Controllers\Api;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
{
    $user = User::find($id);
    
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json($user);
}

    public function login (Request $request){

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Ambil data dari request
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('email', $username)->first();

        $response = [];

        if ($user && Hash::check($password, $user->password)) {
            $response = [
                'metaData' => [
                    'code' => 200,
                    'message' => 'Login Successful'
                ],
                'response' => [
                    'id_user' => 1,
                    'username' => $username,
                ]
            ];
        } else {
            $response = [
                'metaData' => [
                    'code' => 401,
                    'message' => 'Login Failed'
                ],
                'response' => new \stdClass()
            ];
        }

        return response()->json($response);
    }


    public function register(Request $request)
    {
        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'user_type' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'metaData' => [
                    'code' => 400,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ],
                'response' => new \stdClass()
            ], 400);
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        $response = [];
        $STATUS_CODE = 200;

        try {
            $response = [
                'metaData' => [
                    'code' => 200,
                    'message' => 'register Successful'
                ],
                'response' => new \stdClass()
            ];
            $STATUS_CODE=200;
        }catch (\Exception $e) {
            $response = [
                'metaData' => [
                    'code' => 500,
                    'message' => $e->getMessage()
                ],
                'response' => new \stdClass()
            ];
            $STATUS_CODE=500;
        }

        return response()->json($response, $STATUS_CODE);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'user_type' => 'required|string|in:Karyawan,Magang', // Pastikan hanya menerima nilai valid
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Update gagal. Silakan periksa data Anda.',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui.',
            'data' => $user
        ], 200);
    }


    // Metode untuk menghapus data karyawan
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus.',
        ], 200);
    }

}
