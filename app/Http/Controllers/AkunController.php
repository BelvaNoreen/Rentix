<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:Users',
            'password' => 'required|string|confirmed|min:6'
        ]);
    
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($fields['password']),
        ]);
    
        $token = $User->createToken('tokenku')->plainTextToken;
    
        $response = [
            'User' => $User,
            'token' => $token
        ];

        return response($response, 201);
    }
 
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
 
        // check email
        $User = User::where('email', $fields['email'])->first();
 
        // check password
        if (!$User || !Hash::check($fields['password'], $User->password)){
            return response([
                'message' => 'unauthorized'
            ], 401);
        }
 
        $token = $User->createToken('authToken')->plainTextToken;
 
        $response = [
            'User' => $User,
            'token' => $token
        ];
            
        return response($response, 201);
    }
 
    public function logout(Request $request) 
    {
     $request->User()->currentAccessToken()->delete();
 
     return response()->json([
         'message' => 'User berhasil logout'
     ], 200);
    }
}
