<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserType;
use Illuminate\Support\Facades\Log;

class UserTypeController extends Controller
{
    public function index()
    {
        $data = UserType::orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
         
    try{


    Log::info('Store API called', $request->all());

        $request->validate([
            'user_type' => 'required',
            'status' => 'required'
        ]);

        $user_type = $request->user_type;

        if($user_type){

                $exist = UserType::where('user_type',$user_type)
                                ->where('is_delete',0)
                                ->exists();

                                if($exist){
                                    return response()->json([ "message"=> "User Type Already Exists", "status"=> false]);
                                }
        }

        $data = UserType::create([
            'unique_id' => uniqid(),
            'user_type' => $request->user_type,
            'is_active' => $request->status
        ]);
          Log::info('User Type Created', ['id' => $data->id]);

        return response()->json([
            'msg' => 'User Type Created',
            'data' => $data
        ]);
        }
        catch (\Exception $e) {

        Log::error('Error creating User Type', [
            'error' => $e->getMessage()
        ]);

        return response()->json([
            'message' => 'Error occurred'
        ], 500);
    }


    }
    public function show($id)
    {
        $data = UserType::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_type' => 'required',
            'status' => 'required'
        ]);

        $user_type = $request->user_type;

          if($user_type){

                $exist = UserType::where('user_type',$user_type)
                                ->where('is_delete',0)
                                ->where('id','!=',$id)
                                ->exists();

                                if($exist){
                                    return response()->json([ "message"=> "User Type Already Exists", "status"=> false]);
                                }
        }
        $data = UserType::findOrFail($id);

        $data->update([
            'user_type' => $request->user_type,
            'is_active' => $request->status
        ]);

        return response()->json([
            'msg' => 'User Type Updated',
            'data' => $data
        ]);
    }
    public function destroy($id)
{
    DB::table('user_type')
        ->where('id', $id)
        ->update([
            'is_delete' => 1
        ]);

    return response()->json([
        'status' => true,
        'message' => 'User deleted successfully'
    ]);
}


}