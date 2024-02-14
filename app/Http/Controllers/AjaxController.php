<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AjaxModel;


class AjaxController extends Controller
{
    public function addAjax(Request $request){
        
        $file = $request->file('file');

        $fileName = time().''.$file->getClientOriginalName(); 

        $filePath = $file->storeAs('image',$fileName,'public');

        $AjaxModel = new AjaxModel;
        $AjaxModel->name = $request->name;
        $AjaxModel->email = $request->email;
        $AjaxModel->file = $filePath;
        $AjaxModel->save();
        
return response()->json(['res'=>'geted']);
    }

    public function ajaxData(){
$AjaxModel = AjaxModel::all();
return response()->json(['AjaxModel'=>$AjaxModel]);
    }

    public function editAjaxData($id){
$ajaxData = AjaxModel::where('id',$id)->get();
return view('editAjax',['data'=>$ajaxData]);
    }
    public function updateAjaxData(Request $request){
$AjaxModel = AjaxModel::find($request->id);
$AjaxModel->name = $request->name;
$AjaxModel->email = $request->email;

if($request->file('file'))
{
    $file= $request->file('file');
    $fileName = time().''.$file->getClientOriginalName();
    $filePath = $file->storeAs('image',$fileName,'public');
    $AjaxModel->file = $filePath;
}
$AjaxModel->save();

return response()->json(['result'=>'data updated']);

    }
    //
}
