<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route:: get('/home', function(){
    return view('pokemon.home');
});

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/admin/sidebar', function(){return view('admin_layouts.sidebar');});
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/editprofile', [ProfileController::class, 'editAdmin'])->name('admin_layouts.profile.edit');

    //User accounts
    Route::get('/admin/user', [UserController::class, 'UserIndex'])->name('admin.user');
    Route::get('/admin/search', [UserController::class, 'UserSearch'])->name('admin.search_users');
    Route::post('/admin/user', [UserController::class,'store'])->name('admin.store');
    Route::get('/admin/show',[UserController::class,'show'])->name('admin.show_user');
 
 });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
