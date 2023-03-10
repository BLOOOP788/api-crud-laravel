<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('notes',[NoteController::class,'index']);
Route::post('notes',[NoteController::class,'store']);
Route::get('notes/{note}',[NoteController::class,'show']);
Route::put('notes/{note}',[NoteController::class,'update']);
Route::delete('notes/{note}',[NoteController::class,'destroy']);
Route::get('notes/categories/{cat}',[NoteController::class,'getByCategories']);
//categories
Route::get('categories',[CategoryController::class,'index']);
Route::post('categories',[CategoryController::class,'store']);
Route::get('categories/{category}',[CategoryController::class,'show']);
Route::put('categories/{category}',[CategoryController::class,'update']);
Route::delete('categories/{category}',[CategoryController::class,'destroy']);