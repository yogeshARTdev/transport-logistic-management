<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\ReceivedGoodsController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CategoryController;
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

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post-login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/post-register', [AuthController::class, 'postRegister'])->name('post-register');

Route::group(['middleware' => ['auth']], function () { 
    Route::resource('supplier', SupplierController::class);
    Route::get('/supplier-sort', [SupplierController::class, 'sort'])->name('supplier-sort');
    Route::get('/supplier-search', [SupplierController::class, 'search'])->name('supplier-search');
    Route::get('supplier_export',[SupplierController::class, 'get_supplier_data'])->name('supplier.export');

    Route::resource('client', ClientController::class);
    Route::get('/client-sort', [ClientController::class, 'sort'])->name('client-sort');
    Route::get('/client-search', [ClientController::class, 'search'])->name('client-search');
    Route::get('client_export',[ClientController::class, 'get_supplier_data'])->name('client.export');


    Route::resource('driver', DriverController::class);
    Route::get('/driver-sort', [DriverController::class, 'sort'])->name('driver-sort');
    Route::get('/driver-search', [DriverController::class, 'search'])->name('driver-search');
    Route::get('driver_export',[DriverController::class, 'get_supplier_data'])->name('driver.export');

    Route::resource('goods', GoodsController::class);
    Route::get('/goods-sort', [GoodsController::class, 'sort'])->name('goods-sort');
    Route::get('/goods-search', [GoodsController::class, 'search'])->name('goods-search');
    Route::get('goods_export',[GoodsController::class, 'get_supplier_data'])->name('goods.export');

    Route::resource('receivedgoods', ReceivedGoodsController::class);
    Route::get('/receivedgoods-sort', [ReceivedGoodsController::class, 'sort'])->name('receivedgoods-sort');
    Route::get('/receivedgoods-search', [ReceivedGoodsController::class, 'search'])->name('receivedgoods-search');
    Route::get('receivedgoods_export',[ReceivedGoodsController::class, 'get_supplier_data'])->name('receivedgoods.export');

    Route::resource('warehouse', WarehouseController::class);
    Route::get('/warehouse-sort', [WarehouseController::class, 'sort'])->name('warehouse-sort');
    Route::get('/warehouse-search', [WarehouseController::class, 'search'])->name('warehouse-search');
    Route::get('warehouse_export',[WarehouseController::class, 'get_supplier_data'])->name('warehouse.export');

    Route::resource('vehicle', VehicleController::class);
    Route::get('/vehicle-sort', [VehicleController::class, 'sort'])->name('vehicle-sort');
    Route::get('/vehicle-search', [VehicleController::class, 'search'])->name('vehicle-search');
    Route::get('vehicle_export',[VehicleController::class, 'get_supplier_data'])->name('vehicle.export');

    Route::resource('vehicletype', VehicleTypeController::class);
    Route::get('/vehicletype-sort', [VehicleTypeController::class, 'sort'])->name('vehicletype-sort');
    Route::get('/vehicletype-search', [VehicleTypeController::class, 'search'])->name('vehicletype-search');
    Route::get('vehicletype_export',[VehicleTypeController::class, 'get_supplier_data'])->name('vehicletype.export');

    Route::resource('trip', TripController::class);
    Route::get('/trip-sort', [TripController::class, 'sort'])->name('trip-sort');
    Route::get('/trip-search', [TripController::class, 'search'])->name('trip-search');
    Route::get('trip_export',[TripController::class, 'get_supplier_data'])->name('trip.export');

    Route::resource('category', CategoryController::class);
    Route::get('/category-sort', [CategoryController::class, 'sort'])->name('category-sort');
    Route::get('/category-search', [CategoryController::class, 'search'])->name('category-search');
    Route::get('category_export',[CategoryController::class, 'get_supplier_data'])->name('category.export');

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/contact', function () {
        return view('contact');
    });
});