<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function apidemoo()
    {
        $users = User::all();
        return response()->json([
            'message' => count($users) . " users Found",
            'data' => $users,
            'status' => true
        ], 200);
    }
    public function show($id)
    {
        $user = User::find($id);
        if ($user != null) {
            return response()->json([
                'meaasage' => "record found",
                'data' => $user,
                'status' => true
            ], 200);
        } else {
            return response()->json([
                'meaasage' => "record not found",
                'data' => [],
                'status' => true
            ], 200);
        }

    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'message' => "please fix the errors",
                'error' => $validator->errors(),
                'status' => false
            ], 200);
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'message' => "user added successfully",
                'data' => $user,
                'status' => true
            ], 200);
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                'message' => "user not found",
                'status' => false
            ], 200);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => "please fix the errors",
                'error' => $validator->errors(),
                'status' => false
            ], 200);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'message' => 'user updated successfully',
            'data' => $user,
            'status' => true
        ], 200);
    }
    public function del($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                'message' => 'user not found',
                'status' => false
            ], 200);
        }
        $user->delete();
        return response()->json([
            'message' => 'user deleted successfully',
            'status' => true
        ],200);
    }
}
