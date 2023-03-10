<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RemajaController;
use App\Http\Controllers\penggunaController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('windmill-dashboard.public.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [RemajaController::class, 'index'])->name('dashboard');
Route::get('/tambahremaja', [penggunaController::class, 'tambahmasuk'])->name('tambahmasuk');
Route::get('/dashboard', [RemajaController::class,'index'])->middleware(['auth','verified']);
Route::post('/dashboard', [penggunaController::class, 'insertremaja'])->name('insertremaja');
route::delete('/dashboard/{id}', [penggunaController::class,'delete'])->middleware(['auth','verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

route::get('/remaja', [penggunaController::class,'index'])->middleware(['auth','verified']);
route::get('/remaja/store', [penggunaController::class,'store'])->middleware(['auth','verified']);

Route::get('/remaja', [RemajaController::class, 'index']);
require __DIR__.'/auth.php';
