<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ValidateAuth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(ValidateAuth $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json(['message' => 'Invalid Credentials'], 404);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json(['token' => $token]);
    }
    
    public function me(Request $request)
    {
        $user = $request->user();
        return new UserResource($user);
    }
    
    public function logout(Request $request)
    {
        $user = $request->user();
        
        //revoke all tokens Users
        $user->tokens()->delete();
        return response()->json([], 204);
    }
}
