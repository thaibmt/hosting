<?php

use App\Livewire\Category;
use App\Livewire\Domain;
use App\Livewire\Frontend\Home;
use App\Livewire\Hosting;
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

Route::get('/', Home::class);

Route::prefix('admin')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('category/{type}', Category::class);
    Route::get('hosting', Hosting::class);
    Route::get('domain', Domain::class);
});