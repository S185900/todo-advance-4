<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::patch('/todos/{todo_id}', [TodoController::class, 'update']);
Route::delete('/todos/{todo_id}', [TodoController::class, 'destroy']);
Route::get('/todos/search', [TodoController::class, 'search']);

//エラー回避のためのルーティング
// Route::get('/todos/{todo_id}', [TodoController::class, 'store']);
// Route::get('/todos/{todo_id}', [TodoController::class, 'update']);
// Route::get('/todos/{todo_id}', [TodoController::class, 'destroy']);



Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
// Route::patch('/categories/update', [CategoryController::class, 'update']);
// Route::patch('/categories/delete', [CategoryController::class, 'destroy']);
Route::patch('/categories/{category_id}', [CategoryController::class, 'update']);
Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy']);


//エラー回避のためのルーティング
// Route::get('/categories/{category_id}', [CategoryController::class, 'store']);
// Route::get('/categories/update', [CategoryController::class, 'update']);
// Route::get('/categories/{category_id}', [CategoryController::class, 'update']);
// Route::get('/categories/{category_id}', [CategoryController::class, 'destroy']);




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

// Route::get('/', function () {
//     return view('welcome');
// });
