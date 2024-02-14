<?php

namespace App\Http\Controllers;
use App\Models\student;

use Illuminate\Http\Request;

class studetController extends Controller
{
    public function getData(Request $request){
       
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'file' => 'required',
        ]);

        $response[] = $request->all();
        $file = $request->file('file');
        $fileName = time().''.$file->getClientOriginalName();
        $filePath = $file->storeAs('images',$fileName,'public');
        $student = new student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->file = $filePath;
        $student->save();

        $message = "Success";
        return response()->json(['data' => $message]);
    }
}
