<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
      'contests' => Listing::getListings()
    ]);
});


Route::get('/contest/{id}', function($id) {
  return view('contest', [
    'contest' => Listing::getListingById($id)
  ]);
});