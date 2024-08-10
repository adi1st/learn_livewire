<?php

use App\Http\Controllers\UserController;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/todo', TodoList::class)->name('todo.home');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', function () {
    return view('users.index');
})->name('users.home');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.deteils');
