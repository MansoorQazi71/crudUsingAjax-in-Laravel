<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class DataController extends Controller
{
    public function loadView()
    {
        return view('dynamic_fields');
    }
    public function saveData(Request $request)
    {
        $fileNames=[];
        foreach($request->filess as $file)
        {
$fileName=time().'.'.$file->getClientOriginalName();
$file->move(public_path('files'),$fileName);
$fileNames[]='files/'.$fileName;
        }
        $insertData=[];
        for($x=0; $x<count($request->names);$x++)
        {
            $insertData[]=[
                'name'=>$request->names[$x],
                'email'=>$request->emails[$x],
                'file'=>$fileNames[$x],

            ];
        }
        DataModel::insert($insertData);
        return redirect()->back()->with('success','Data inserted successfully!');
    }
    //
}
