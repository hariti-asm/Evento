<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrganizerController;

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

// Route::any('/', [homeController::class, 'filter'])->name('home');
// Route::group(function () {
Route::get('/', [homeController::class, 'filter'])->name('filter.events');
Route::get('/event_detail/{event}', [EventController::class, 'event_detail'])->name('event_detail');
Route::post('/events/{event}', [EventController::class, 'book'])->name('booking.store');
// });
Route::get('/organizers', [OrganizerController::class, 'index'])->name('organizers');
Route::get('/organizers/{event}', [OrganizerController::class, 'update'])->name('events.validate');
// Route::prefix('organizer')->group(function () {

// });
Route::resource('events', EventController::class);


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/clients', [AdminController::class, 'getclients'])->name('admin.clients');
    Route::patch('/events/{event}/approve', [AdminController::class, 'update'])->name('events.approve');
    Route::patch('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.validate');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('admin.reservations');

    Route::get('/events', [AdminController::class, 'index'])->name('admin.events');
    Route::patch('/clients/{user}', [UserController::class, 'update'])->name('users.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
