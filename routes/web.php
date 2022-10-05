<?php

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\transaction\IssuingController;
use App\Http\Controllers\transaction\ReceivingController;


use App\Http\Controllers\master_item\ItemController;
use App\Http\Controllers\master_item\KategoriBrandController;
use App\Http\Controllers\master_item\KategoriProukController;
use App\Http\Controllers\report\ReportIssuingController;
use App\Http\Controllers\report\ReportReceivingController;
use App\Http\Controllers\report\ReportStockController;
use App\Http\Controllers\supplier_customer\CustomerController;
use App\Http\Controllers\supplier_customer\SupplierController;
use App\Http\Controllers\transaction\Detail_issuingController;
use App\Http\Controllers\transaction\Manage_itemController;
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

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('supplier-customer/supplier', SupplierController::class);
Route::resource('supplier-customer/customer', CustomerController::class);

Route::resource('master/kategori-produk', KategoriProukController::class);
Route::resource('master/kategori-brand', KategoriBrandController::class);


Route::resource('master/item', ItemController::class);
// Route::post('master/item/store_detail_brand', [ItemController::class, 'store_detail_brand']);

Route::resource('transaction/receiving', ReceivingController::class);
Route::resource('transaction/manage-receiving', Manage_itemController::class);
Route::get('transaction/manage-receiving/{ball_number}/create', [Manage_itemController::class, 'create_manage_receiving']);

Route::resource('transaction/issuing', IssuingController::class);
Route::get('transaction/issuing/{id}/get-item-ajax', [IssuingController::class, 'get_item_ajax']);
Route::get('transaction/issuing/{id}/get-valut-item-ajax', [IssuingController::class, 'get_value_item_ajax']);
Route::resource('transaction/detail_issuing', Detail_issuingController::class);


Route::get('report/stock', [ReportStockController::class, 'index']);
Route::get('report/stock/print', [ReportStockController::class, 'print_stock']);
Route::get('report/issuing', [ReportIssuingController::class, 'index']);
Route::get('report/receiving', [ReportReceivingController::class, 'index']);
