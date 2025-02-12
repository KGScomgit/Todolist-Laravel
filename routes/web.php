<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/todolist/create', [TodoController::class, 'create']);
Route::get('/todolist', [TodoController::class, 'index'])->name('todolist.index');
Route::post('/todolist',[TodoController::class, 'store'])->name('todolist.store');
Route::put('/todolist/{id}',[TodoController::class, 'update'])->name('todolist.update');
Route::delete('/todolist/{id}',[TodoController::class, 'destroy'])->name('todolist.destroy');

Route::get('/', function () {
    return view('welcome');

});

