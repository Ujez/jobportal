<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;



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



Route::get('/', [ListingController::class, 'index'])
    ->name('listings.index');
Route::match( ['get', 'post'], '/botman', [BotManController::class, 'handle']);
// Route::post('/botman', [BotManController::class, 'handle'])
//     ->name('listings.index');

Route::get('/new', [ListingController::class, 'create'])
    ->name('listings.create');

Route::post('/new', [ListingController::class, 'store'])
    ->name('listings.store');

Route::get('/listing/edit', [ListingController::class, 'editIndex'])->name('listings.demo');
Route::get('/listing/edit/{id}', [ListingController::class, 'Edit'])->name('listings.edit');
Route::post('/listing/update/{id}', [ListingController::class, 'Update']);

Route::get('/dashboard', function (\Illuminate\Http\Request$request) {
    return view('dashboard', [
        'listings' => $request->user()->listings,
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('newsletter', [NewsletterController::class, 'create']);

Route::post('newsletter/store', [NewsletterController::class, 'store']);
Route::post('newsletter/store', [NewsletterController::class, 'addNews']);

require __DIR__ . '/auth.php';

Route::get('/{listing}', [ListingController::class, 'show'])
    ->name('listings.show');

Route::get('/{listing}/apply', [ListingController::class, 'apply'])
    ->name('listings.apply');
