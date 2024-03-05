<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CreateTodoController;
use App\Http\Controllers\CreateTodoGroupController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/createTodo', [CreateTodoController::class, 'showCreateTodoForm'])->name('createTodo');
Route::post('/createTodo', [CreateTodoController::class, 'createTodo']);
Route::get('/todo', [TodoController::class, 'showTodoForm'])->name('todo');
Route::post('/todo', [TodoController::class, 'todo']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::post('/todo/store', [TodoController::class, 'store'])->name('storeTodo');

Route::get('/createTodo', [CreateTodoController::class, 'showCreateTodoForm'])->name('createTodo');
Route::post('/createTodo', [CreateTodoController::class, 'createTodo']);
 
Route::get('/createTodoGroup', [CreateTodoGroupController::class, 'showCreateTodoGroupForm'])->name('createTodoGroup');
Route::post('/createTodoGroup', [CreateTodoGroupController::class, 'createTodoGroup']);

