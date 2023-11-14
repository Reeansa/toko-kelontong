<?php


use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get ('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/process', [LoginController::class, 'authenticate'])->name('login.process');

ROute::get('/register', [LoginController::class, 'register'])->name('register');
ROute::post('/register/process', [LoginController::class, 'registerProcess'])->name('register.process');

Route::get( '/', [ DashboardController::class, 'index' ] );
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::get('/users/add', [UserController::class, 'create'])->name('users.add')->middleware('auth');
Route::post('/users/add/process', [UserController::class, 'store'])->name('users.add.process')->middleware('auth');
Route::get('/users/{user}/show', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
Route::delete( '/users/{user}', [ UserController::class, 'destroy' ])->name( 'users.delete' );
Route::put('users/change-status/{user}', [UserController::class, 'changeStatus'])->name('users.change-status');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Create, Read, Update, Delete barang
Route::resource( 'barang', BarangController::class)->middleware('auth');
