<?php

use App\Http\Controllers;
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

Route::get('/', [Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::get('/new', [Controllers\ListingController::class, 'create'])
    ->name('listings.create');

Route::post('/new', [Controllers\ListingController::class, 'store'])
    ->name('listings.store');

Route::get('/dashboard', function (\Illuminate\Http\Request$request) {
    return view('dashboard', [
        'listings' => $request->user()->listings,
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('newsletter', [NewsletterController::class, 'create']);

Route::post('newsletter/store', [NewsletterController::class, 'store']);

require __DIR__ . '/auth.php';

Route::get('/{listing}', [Controllers\ListingController::class, 'show'])
    ->name('listings.show');

Route::get('/{listing}/apply', [Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');
