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

Route::get('/', function () {
    return view('index', [
      'title' => 'Bine ai venit la ONI Vault!',
      'contests' => Contest::all()
    ]);
});


// Contest Routes
Route::get('/contest/{name_id}', [ContestController::class, 'show'])->name('contests.show');
Route::get('/contest/{name_id}/{sub_contest_name_id}', [SubContestController::class, 'show'])->name('sub_contests.show');

// Profile Routes
Route::get('profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profiles.show');