<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Inertia\Inertia;

// controllers for routes
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientsController;


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
    return Inertia::render('welcome');
});





// login
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});



// required login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // clients
    Route::controller(ClientsController::class)->group(function(){
        Route::get('/clients','index')->name('clients.index');
        Route::get('/clients/add', 'add')->name('clients.add');
        Route::get('/clients/view/{client_id}', 'view')->name('clients.view');
        Route::get('/clients/edit/{client_id}', 'edit')->name('clients.edit');
        Route::delete('/clients/delete/{client_id}', 'delete')->name('clients.delete');
        Route::post('/clients/save/{client_id?}', 'save')->name('clients.save');
    });

});