<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCreation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = UserCreation::where('user_name', $request->name)->first();

        // dd($user);

        if (!$user || !Hash::check($request->password, $user->hash_password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials',
            ]);
        }

        $user->tokens()->delete();

        // create new token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'token' => $token,
            'user' => $user,
            'message' => 'Login Successfully'
        ]);
    }

    public function logout(Request $request){

        $user = Auth::user();

        if(!$user){
            
        return reponse()->json(['status' => false,
            'message' => 'Unauthenticated'
        ]);
        }
            
if($user->id  != $request->user_id){
 return response()->json([
            'status' => false,
            'message' => 'User mismatch'
        ], 403);
}


  $user->currentAccessToken()->delete();


    return response()->json([
        'status' => true,
        'message' => 'Logged out successfully'
    ]);
    
}

}