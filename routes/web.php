<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    // return view('welcome');
    return Inertia::render('welcome');
});


// Route::get('/clients', function(){
//     return view('clients');
// });

use App\Http\Controllers\ClientsController;
Route::controller(ClientsController::class)->group(function(){
    Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/clients/add', [ClientsController::class, 'add'])->name('clients.add');
    Route::get('/clients/view/{client_id}', [ClientsController::class, 'view'])->name('clients.view');
    Route::get('/clients/edit/{client_id}', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::delete('/clients/delete/{client_id}', [ClientsController::class, 'delete'])->name('clients.delete');
    Route::post('/clients/save/{client_id?}', [ClientsController::class, 'save'])->name('clients.save');
});