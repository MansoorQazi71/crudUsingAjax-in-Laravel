<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studetController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AjaxController;
use App\Models\DataModel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/create-user',function()
// {return view('form');
Route::get('/create',function()
{return view('validated-form');

});
Route::get('/',function()
{return view('validated-form');

});
Route::get('/dynamic',function()
{return view('dynamic_fields');

});
Route::get('/ajax',function()
{return view('ajax-form');

});
Route::get('/ajaxdata',function()
{return view('ajax-data');

})->name('ajaxdata');
// Route::post('/create-user',[studetController::class,'getData'])->name('create-user');
Route::post('/create',[studetController::class,'getData'])->name('create');
Route::get('/dynamic',[DataController::class,'loadView'])->name('dynamic');
Route::post('/saveData',[DataController::class,'saveData'])->name('saveData');
Route::post('/ajax',[AjaxController::class,'addAjax'])->name('addAjax');
Route::get('/ajax-data',[AjaxController::class,'ajaxData'])->name('ajaxData');
Route::get('editAjaxData/{id}',[AjaxController::class,'editAjaxData'])->name('editAjaxData');
Route::post('updateAjaxData',[AjaxController::class,'updateAjaxData'])->name('updateAjaxData');