<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function Register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }


    public function Login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'message' => 'Email or password incorrect',
        ], 401);
    }


    public function GetUsers(Request $request)
    {
        $users = User::all();
        return response()->json([
            'message' => 'Users retrieved successfully',
            'users' => $users,
        ]);
    }

    public function getUser($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }


    $request->validate([
        'name' => 'string|max:255',
        'email' => 'email|unique:users,email,' . $id,
        'phone' => 'nullable|string|max:20',
        'age' => 'nullable|integer|min:0',
    ]);

    // Update fields
    $user->update($request->all());

    return response()->json([
        'message' => 'User updated successfully',
        'user' => $user
    ]);
}
    
}