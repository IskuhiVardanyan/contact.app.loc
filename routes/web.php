<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Settings\AccountController;
use Illuminate\Http\Request;

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
Route::get('/', function (){
    return view('welcome');
});


//Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
//Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
//Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
//Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
//Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
//Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
//Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::resources([
    '/contacts' => ContactController::class,
    '/companies' => CompanyController::class
]);

//Route::get('/contacts', [ContactController::class, 'index'])
//    ->name('contacts.index')
//    ->middleware('auth');
//Route::post('/contacts', [ContactController::class, 'store'])
//    ->name('contacts.store')
//    ->middleware('auth');
//Route::get('/contacts/create', [ContactController::class, 'create'])
//    ->name('contacts.create')
//    ->middleware('auth');
//Route::get('/contacts/{id}', [ContactController::class, 'show'])
//    ->name('contacts.show')
//    ->middleware('auth');
//Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])
//    ->name('contacts.edit')
//    ->middleware('auth');
//Route::put('/contacts/{id}', [ContactController::class, 'update'])
//    ->name('contacts.update')
//    ->middleware('auth');
//Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])
//    ->name('contacts.destroy')
//    ->middleware('auth');


//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('settings/account', [AccountController::class, 'index'])
        ->name('settings.account');
