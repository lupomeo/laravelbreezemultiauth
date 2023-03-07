<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersmController;
use App\Http\Controllers\UserareaController;

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

Route::get('/', function () {
    return view('welcome');
});




/*------------------------------------------
--------------------------------------------
All Logged Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware('auth')->group(function () {
    Route::get('/userarea', [UserareaController::class, 'index'])->name('userarea');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('usersm', [UsersmController::class, 'index'])->name('usersm');
    Route::get('usersm/list', [UsersmController::class, 'getUsersm'])->name('usersm.list');
    Route::post('store-user', [UsersmController::class, 'store']);
    Route::post('delete-user', [UsersmController::class, 'destroy']);
    Route::post('edit-usersm', [UsersmController::class, 'edit']);
    
});





// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
