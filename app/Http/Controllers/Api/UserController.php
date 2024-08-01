<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

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

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $request->username)->first();
        $response = [];

        if ($user && Hash::check($request->password, $user->password)) {
            $response = [
                'metaData' => [
                    'code' => 200,
                    'message' => 'Login Successful'
                ],
                'response' => [
                    'id_user' => $user->id,
                    'username' => $user->email,
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

        try {
            // Buat pengguna baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
            ]);

            $response = [
                'metaData' => [
                    'code' => 200,
                    'message' => 'Register Successful'
                ],
                'response' => $user
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'metaData' => [
                    'code' => 500,
                    'message' => 'Registration failed: ' . $e->getMessage(),
                ],
                'response' => new \stdClass()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'user_type' => 'required|string|in:Karyawan,Magang',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Update failed. Please check your data.',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Data successfully updated.',
            'data' => $user
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data successfully deleted.',
        ], 200);
    }
}
