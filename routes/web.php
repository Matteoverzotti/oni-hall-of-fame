<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contest;
use App\Models\SubContest;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\SubContestController;

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


Route::get('contest/{name_id}', [ContestController::class, 'show'])->name('contest.show');
Route::get('contest/{name_id}/{subcontest_id}', [SubContestController::class, 'show'])->name('subcontest.show');