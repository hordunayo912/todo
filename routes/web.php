<?php

use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/home', [todoController::class, 'home']);
Route::post('/submit', [todoController::class, 'create'])->name('insertTo');
Route::get('/todoinfo', [todoController::class, 'show'])->name('todoinfo');
Route::get('/delete/{id}', [todoController::class, 'delete']);
Route::get('/edit/{id}', [todoController::class, 'edit']);
Route::POST('/update/{id}', [todoController::class, 'update'])->name('update');


