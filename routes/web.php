<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpaController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ReservationsController;
use App\Models\RoomType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

// Strona główna zwraca domyślną stronę laravela
Route::get('/', function () {
    $roomtypesCards = RoomType::with('room')->orderBy('id')->limit(6)->get();
        $allRoomTypes = RoomType::with('room')->orderBy('id')->get();
    return view('roomtypes.index', ['roomtypesCards' => $roomtypesCards, 'roomtypes' => $allRoomTypes]);
});

Route::get('/test', function () {
    return DB::select('select * from roomtypes');
});

// Zwraca pokoje w formie listy
Route::get('/roomtype_test', function () {
    return print_r(RoomType::all(), true);
});


// Route::controller(TripController::class)->group(function () {
//     Route::get('/trips', 'index');
//     Route::get('/trips/{id}', 'show')->name('trips.show');
// });

// Resource powinien przekazywać ruch do kontrollera który ma metody index(), show(), store(), edit()... https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
Route::resource('roomtypes', RoomTypeController::class);

Route::resource('rooms', RoomController::class);

Route::resource('spa', SpaController::class);

Route::resource('restaurant', RestaurantController::class);

Route::resource('about',AboutController::class);

Route::resource('reservations', ReservationsController::class);

Route::resource('offers', OfferController::class);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});
