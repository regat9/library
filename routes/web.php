<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::group([
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers',
], function() {
        Route::get('users/librarians', [UserController::class, 'librarians'])
            ->middleware(['admin'])
            ->name('users.librarians');
        Route::get('users/readers', [UserController::class, 'readers'])
            ->middleware(['admin'])
            ->name('users.readers');
        Route::resource('users', UserController::class);

        Route::resource('books', BookController::class, [
            'only' => [
                'index',
                'show',
            ]
        ]);

        Route::resource('books', BookController::class, [
            'only' => [
                'create',
                'store',
                'edit',
                'update',
                'destroy',
            ]
        ])->middleware(['admin']);

        Route::resource('categories', CategoryController::class, [
            'only' => [
                'index',
                'show',
            ]
        ]);

        Route::resource('categories', CategoryController::class, [
            'only' => [
                'create',
                'store',
                'edit',
                'update',
                'destroy',
            ]
        ])->middleware(['admin']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
