<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return redirect()->route('projects.index');
// });

//come faccio a dire di metetre come uri '/' ma quando clicco il progetto vada nella '/projects/{id}

// route per guest
Route::get('/', [MainController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [MainController::class, 'show'])->name('projects.show');

// Route::get('/projects', [MainController::class, 'index'])->name('projects.index');

// Route::get('/dashboard', [DashController::class])->middleware(['auth', 'verified'])->name('dashboard');

// route per admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dashboard', DashController::class)->except(['update']);
    // non funziona con put perciò si usa post
    Route::post('dashboard/{dashboard}', [DashController::class, 'update'])->name('dashboard.update');
});

// roba che non centra 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
