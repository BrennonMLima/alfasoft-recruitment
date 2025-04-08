<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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


Route::redirect('/', '/contacts')->name('home');


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', function() {
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('/', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/{contact}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});

