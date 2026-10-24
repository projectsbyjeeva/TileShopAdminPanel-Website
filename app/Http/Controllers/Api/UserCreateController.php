<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCreation;
use App\Models\UserType;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserCreateController extends Controller
{

       use HasApiTokens;
    public function index()
    {
       $data = UserCreation::with('role')
        ->where('is_delete', 0)
        ->orderBy('id', 'desc')
        ->get()
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email_id,
                'phone' => $item->mobile_no,
                'status' => $item->is_active,
                'user_type' => $item->user_type,
                'user_type_name' => $item->role->user_type ?? ''
            ];
        });

         return response()->json($data);
    }

    public function store(Request $request)
    {
        try {

            Log::info('Store API called', $request->all());

            if (!$request->name) {
                return response()->json([
                    'status' => false,
                    'message' => 'Name is required'
                ]);
            }

            $hash_password = Hash::make($request->password);

            $data = UserCreation::create([
                'unique_id' => uniqid(),
                'name' => $request->name,
                'user_type' => $request->role,
                'mobile_no' => $request->phone,
                'email_id' => $request->email,
                'password' => $request->password,
                'hash_password' => $hash_password,
                'is_active' => $request->status,
                'is_delete' => 0
            ]);

            Log::info('User Created', ['id' => $data->id]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'data' => $data
            ]);

        } catch (\Exception $e) {

            Log::error('Store Error', ['error' => $e->getMessage()]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $data = UserCreation::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        Log::info("=== UPDATE START ===", $request->all());

        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $exist = UserCreation::where('name', $request->name)
            ->where('user_type', $request->role)
            ->where('mobile_no', $request->phone)
            ->where('is_delete', 0)
            ->where('id', '!=', $id)
            ->exists();

            // dd($exist);

        Log::info("Exist check", ['exists' => $exist]);

        if ($exist == true) {
            return response()->json([
                "message" => "Already",
                "status" => false
            ]);
        }

        $data = UserCreation::findOrFail($id);

        $hash_password = $request->filled('password') ? Hash::make($request->password): '';

          
        $updateData = [
            'name' => $request->name,
            'user_type' => $request->role,
            'mobile_no' => $request->phone,
            'email_id' => $request->email,
             'password' => $request->password,
                'hash_password' => $hash_password,

            'is_active' => $request->status
        ];

        Log::info("Updating data", $updateData);

        $data->update($updateData);

        Log::info("=== UPDATE END ===");

        return response()->json([
            'msg' => 'User Updated',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        DB::table('user_creation')
            ->where('id', $id)
            ->update([
                'is_delete' => 1
            ]);

        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ]);
    }


    public function usertype(){

        $data = UserType::where('is_delete',0)
                        ->get();

        return response()->json(['data'=> $data]);
    }
}