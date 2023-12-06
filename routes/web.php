<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contest;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\SubContestController;
use App\Http\Controllers\ProfileController;


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

// Contest Routes
Route::get('/contests', [ContestController::class, 'index'])->name('contests.index');

// Create Contest
Route::get('/contests/create', [ContestController::class, 'create'])->name('contests.create');
Route::post('/contests', [ContestController::class, 'store'])->name('contests.store');

// Edit Contest
Route::get('/contest/{name_id}/edit', [ContestController::class, 'edit'])->name('contests.edit');
Route::put('/contest/{name_id}', [ContestController::class, 'update'])->name('contests.update');

// Delete Contest
Route::delete('/contest/{name_id}', [ContestController::class, 'destroy'])->name('contests.destroy');

// Delete SubContest
Route::delete('/contest/{name_id}/{sub_contest_name_id}', [SubContestController::class, 'destroy'])->name('sub_contests.destroy');

// Show contests
Route::get('/contest/{name_id}', [ContestController::class, 'show'])->name('contests.show');
Route::get('/contest/{name_id}/{sub_contest_name_id}', [SubContestController::class, 'show'])->name('sub_contests.show');

// Profile Routes
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profiles.show');

Route::get('/', function() {
    return view('index', [
        'contests' => Contest::orderByDesc('date')->take(5)->get()
    ]);
});
