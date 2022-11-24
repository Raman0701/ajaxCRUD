<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[RecordController::class,"index"]);
Route::get('/add-record',[RecordController::class, "create"]);
Route::post('/store',[RecordController::class, "store"]);
Route::get('/edit-record/{record}',[RecordController::class,"edit"]);
Route::put('/update-record/{record}',[RecordController::class,"update"]);
Route::get('/delete-record/{record}',[RecordController::class,"destroy"]);