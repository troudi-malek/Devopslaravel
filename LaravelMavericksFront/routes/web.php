<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HebergementFrontController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\VoyageurController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ItineraireController;

use App\Http\Controllers\EquipementController;

use App\Http\Controllers\GuideController;
use App\Http\Controllers\ConseilVoyageController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\HebergementController;
use App\Http\Controllers\blogAdmin;
use App\Http\Controllers\EventAd;

/*
|---------------------------------------------------------------------------|
| Web Routes                                                                |
|---------------------------------------------------------------------------|
| Here is where you can register web routes for your application.           |
| These routes are loaded by the RouteServiceProvider within a group        |
| which contains the "web" middleware group. Now create something great!    |
*/

// Public route for the homepage


// Routes accessible by regular users
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/hebergements', [HebergementFrontController::class, 'index'])->name('hebergements.index');
    Route::get('/activities', [ActivityController::class, 'index']);
    Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
    Route::post('/activities/{activity_id}/rate', [ActivityController::class, 'storeRating']);
    Route::get('/getRating/{activity_id}', [ActivityController::class, 'getRating']);
    Route::get('/voyageurs/{voyageur}/edit', [VoyageurController::class, 'edit'])->name('voyageurs.edit');
});

// Routes requiring authentication
Route::resource('evenements', EvenementController::class)->middleware('auth');
Route::resource('evenements.blogs', BlogController::class);

// Authentication routes
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->middleware('auth');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// Admin-specific routes protected by the 'admin' role
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('transports', TransportController::class);
    Route::resource('hebergements', HebergementController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('ratings', RatingController::class);
    Route::resource('evenements', EventAd::class);
    Route::resource('evenements.blogs', blogAdmin::class);
    Route::resource('voyageurs', VoyageurController::class);
    Route::resource('equipements', EquipementController::class);
    Route::resource('/reservations', ReservationController::class);


    // Admin reservation management
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations/{id}/accepter', [ReservationController::class, 'accepter'])->name('reservations.accepter');
    Route::post('/reservations/{id}/refuser', [ReservationController::class, 'refuser'])->name('reservations.refuser');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

});
Route::post('/reservations', action: [ReservationController::class, 'store'])->name('reservations.store');

 

// Destinations and itineraries routes
Route::resource('destinations', DestinationController::class)->middleware('auth');
Route::resource('itineraires', ItineraireController::class)->middleware('auth');

// Routes for guide management
Route::middleware('auth')->group(function () {
    Route::get('/guide', [GuideController::class, 'index'])->name('guide.index');
    Route::get('/guide/create', [GuideController::class, 'create'])->name('guide.create');
    Route::post('/guide', [GuideController::class, 'store'])->name('guide.store');
    Route::get('/guide/{guide}/edit', [GuideController::class, 'edit'])->name('guide.edit');
    Route::put('/guide/{guide}/update', [GuideController::class, 'update'])->name('guide.update');
    Route::delete('/guide/{guide}/destroy', [GuideController::class, 'destroy'])->name('guide.destroy');
});


// Routes for travel advice (Conseil Voyage)
Route::middleware('auth')->group(function () {
    Route::get('/conseil', [ConseilVoyageController::class, 'index'])->name('conseil.index');
    Route::get('/conseil/create', [ConseilVoyageController::class, 'create'])->name('conseil.create');
    Route::post('/conseil', [ConseilVoyageController::class, 'store'])->name('conseil.store');
    Route::get('/conseil/{conseil}/edit', [ConseilVoyageController::class, 'edit'])->name('conseil.edit');
    Route::put('/conseil/{conseil}/update', [ConseilVoyageController::class, 'update'])->name('conseil.update');
    Route::delete('/conseil/{conseil}/destroy', [ConseilVoyageController::class, 'destroy'])->name('conseil.destroy');
});
