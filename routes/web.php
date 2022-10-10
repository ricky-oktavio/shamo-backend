<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
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
Route::group(['middleware' => ['auth:sanctum','verified']], function(){
    Route::name('dashboard.')->prefix('dashboard')->group(function(){
        Route::get('/', [ DashboardController::class, 'index' ])->name('index');
        Route::middleware(['admin'])->group(function(){
            Route::resource('category', ProductCategoryController::class);
        });
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
    // 'auth:sanctum',
    // config('jetstream.auth_session'),
//     'verified','admin'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

