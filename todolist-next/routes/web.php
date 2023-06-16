<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class, 'showSignupForm'])->name('register');
Route::post('/register',[AuthController::class, 'signup']);

Route::post('/newtask', [todoController::class, 'addNewTask']);
Route::get('/alltask', [todoController::class, 'viewAllTask']);

// Route::middleware('loggedin')->group(function()
// {
//     Route::get('/newtask', [todoController::class, 'showTaskPage'])->name('newtask.add');
// });
Route::get('/newtask', [todoController::class, 'showTaskPage'])->name('newtask.add')->middleware('auth');

Route::get('/edittask/{id}', [todoController::class, 'showEditPage'])->name('edittask.show');
Route::PUT('/edittask/{id}', [todoController::class,'edit'])->name('edittask.edit');

Route::get('/deletetask/{id}',[todoController::class,'deleteTask'])->name('deletetask.show');

Route::get('/no-access', function(){
    echo "Please Log In first";
    die;
});

