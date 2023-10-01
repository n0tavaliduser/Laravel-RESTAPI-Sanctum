<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->createToken('API TOKEN')->plainTextToken;

        return $user;
    }

    // Override the logout method
    public function logout(Request $request)
    {
        try {
            Auth::user()->tokens->first()->delete();
        
            Auth::logout();
        
            $request->session()->invalidate();
        
            return response()->json([
                'status' => 200,
                'message' => 'User Successfully logout and token has been removed.'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => false,
                'message' => $error->getMessage()
            ]);
        }
    }

    public function login(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $data['email'])->first();

            if (Hash::check($data['password'], $user->password)) {
                // Revoke old tokens (if any)
                $user->tokens->each(function ($token, $key) {
                    $token->delete();
                });

                // Create a new token for the user
                $token = $user->createToken('API TOKEN')->plainTextToken;

                return response()->json([
                    'status' => 200,
                    'message' => 'Successfully login.',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'message' => 'We cannot find that credentials.'
                ]);
            }
        } catch (Exception $error) {
            return response()->json([
                'status' => false,
                'message' => $error->getMessage()
            ]);
        }
    }
}
