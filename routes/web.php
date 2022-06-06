<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('/test', function () {
    return DB::select('select * from roomtypes');
});

// Zwraca wycieczki w formie listy
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});
