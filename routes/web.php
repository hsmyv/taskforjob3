<?php

use App\Http\Controllers\EssayController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/essay', [EssayController::class, 'store'])->name('essay.store');
    Route::get('/essay/{token}', [EssayController::class, 'show'])->name('essay.show');
});
Route::get('/published_essay/{token}', [EssayController::class, 'published_essay'])->name('essay.published_essay');

Route::get('/essays', [EssayController::class, 'index'])->name('essay.index');

require __DIR__ . '/auth.php';
