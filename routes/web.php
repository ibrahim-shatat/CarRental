<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarShowController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Models\TimeSlot;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/')->middleware('guest:admin,supplier,renter,buyer')->group(function () {
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
    Route::post('{guard}/login', [UserAuthController::class, 'login']);
});
Route::prefix('cms/admin')->middleware('auth:admin,supplier,renter,buyer')->group(function () {
    Route::get('logout', [UserAuthController::class, 'logout'])->name('view.logout');
    });
Route::prefix('cms/admin/')->middleware('auth:admin,supplier,renter,buyer')->group(function () {
    Route::view('', 'cms.home')->name('view.admin');
    
    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');
    Route::get('admin/changePassword', [AdminController::class, 'showChangePassword'])->name('admins_changePassword');
    Route::post('{guard}/change/{id}', [AdminController::class, 'changePassword']);

    Route::resource('suppliers', SupplierController::class);
    Route::post('suppliers_update/{id}', [SupplierController::class, 'update'])->name('suppliers_update');
    Route::get('changePassword', [SupplierController::class, 'showChangePassword'])->name('suppliers_changePassword');
    Route::post('{guard}/change/{id}', [SupplierController::class, 'changePassword']);

    Route::resource('buyers', BuyerController::class);
    Route::post('buyers_update/{id}', [BuyerController::class, 'update'])->name('buyers_update');
    Route::get('changePassword', [BuyerController::class, 'showChangePassword'])->name('buyers_changePassword');
    Route::post('{guard}/change/{id}', [BuyerController::class, 'changePassword']);

    Route::resource('renters', RenterController::class);
    Route::post('renters_update/{id}', [RenterController::class, 'update'])->name('renters_update');
    Route::get('changePassword', [RenterController::class, 'showChangePassword'])->name('renters_changePassword');
    Route::post('{guard}/change/{id}', [RenterController::class, 'changePassword']);

    Route::resource('cars', CarController::class);
    Route::post('cars_update/{id}', [CarController::class, 'update'])->name('cars_update');
    Route::get('cars_recycle', [CarController::class, 'recycle'])->name('cars_recycle');
    Route::get('cars_restore/{id}', [CarController::class, 'restoreCar'])->name('cars_restore');
    Route::get('cars_delete/{id}', [CarController::class, 'force'])->name('cars_delete');

    Route::resource('reservations', ReservationController::class);
    Route::post('reservations_update/{id}', [ReservationController::class, 'update'])->name('reservations_update');
    Route::get('reservations_recycle', [ReservationController::class, 'recycle'])->name('reservations_recycle');
    Route::get('reservations_restore/{id}', [ReservationController::class, 'restoreCar'])->name('reservations_restore');
    Route::get('reservations_delete/{id}', [ReservationController::class, 'force'])->name('reservations_delete');

    Route::resource('receipts', ReceiptController::class);
    Route::post('receipts_update/{id}', [ReceiptController::class, 'update'])->name('receipts_update');
    Route::get('receipts_recycle', [ReceiptController::class, 'recycle'])->name('receipts_recycle');
    Route::get('receipts_restore/{id}', [ReceiptController::class, 'restoreCar'])->name('receipts_restore');
    Route::get('receipts_delete/{id}', [ReceiptController::class, 'force'])->name('receipts_delete');

    Route::resource('reviews', ReviewController::class);
    Route::post('reviews_update/{id}', [ReviewController::class, 'update'])->name('reviews_update');

    Route::resource('timeslots', TimeSlotController::class);
    Route::post('timeslots_update/{id}', [TimeSlotController::class, 'update'])->name('timeslots_update');

    Route::resource('countries', CountryController::class);
    Route::post('countries_update/{id}', [CountryController::class, 'update'])->name('countries_update');

    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}', [CityController::class, 'update'])->name('cities_update');

    Route::resource('car_shows', CarShowController::class);
    Route::post('car_shows_update/{id}', [CarShowController::class, 'update'])->name('car_shows_update');

    Route::resource('roles', RoleController::class);
    Route::post('roles_update/{id}', [RoleController::class, 'update'])->name('roles_update');
    Route::resource('roles.permissions', RolePermissionController::class);

    Route::resource('permissions', PermissionController::class);
    Route::post('permissions_update/{id}', [PermissionController::class, 'update'])->name('permissions_update');
});