<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionInController;
use App\Http\Controllers\TransactionOutController;
use App\Http\Controllers\ReportGoodsInController;
use App\Http\Controllers\ReportGoodsOutController;
use App\Http\Controllers\ReportStockController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WebSettingController;
use App\Http\Controllers\AdminatorController;

Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/',[LoginController::class,'auth'])->name('login.auth');

Route::middleware(['auth'])-> group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::middleware(['user.middleware'])->group(function(){
        // barang (izin untuk staff hanya read)
        Route::get('/barang',[ItemController::class,'index'])->name('barang');
        Route::post('/barang/code',[ItemController::class,'detailByCode'])->name('barang.code');
        Route::get('/barang/list',[ItemController::class,'list'])->name('barang.list');
        Route::post('/barang/save',[ItemController::class,'save'])->name('barang.save');
        Route::post('/barang/detail',[ItemController::class,'detail'])->name('barang.detail');
        Route::post('/barang/update',[ItemController::class,'update'])->name('barang.update');
        Route::delete('/barang/delete',[ItemController::class,'delete'])->name('barang.delete');


        // jenis barang
        Route::get('/barang/jenis',[CategoryController::class,'index'])->name('barang.jenis');
        Route::get('/barang/jenis/list',[CategoryController::class,'list'])->name('barang.jenis.list');
        Route::post('/barang/jenis/save',[CategoryController::class,'save'])->name('barang.jenis.save');
        Route::post('/barang/jenis/detail',[CategoryController::class,'detail'])->name('barang.jenis.detail');
        Route::put('/barang/jenis/update',[CategoryController::class,'update'])->name('barang.jenis.update');
        Route::delete('/barang/jenis/delete',[CategoryController::class,'delete'])->name('barang.jenis.delete');

        // satuan barang
        Route::get('/barang/satuan',[UnitController::class,'index'])->name('barang.satuan');
        Route::get('/barang/satuan/list',[UnitController::class,'list'])->name('barang.satuan.list');
        Route::post('/barang/satuan/save',[UnitController::class,'save'])->name('barang.satuan.save');
        Route::post('/barang/satuan/detail',[UnitController::class,'detail'])->name('barang.satuan.detail');
        Route::put('/barang/satuan/update',[UnitController::class,'update'])->name('barang.satuan.update');
        Route::delete('/barang/satuan/delete',[UnitController::class,'delete'])->name('barang.satuan.delete');

        // merk barang
        Route::get('/barang/merk',[BrandController::class,'index'])->name('barang.merk');
        Route::get('/barang/merk/list',[BrandController::class,'list'])->name('barang.merk.list');
        Route::post('/barang/merk/save',[BrandController::class,'save'])->name('barang.merk.save');
        Route::post('/barang/merk/detail',[BrandController::class,'detail'])->name('barang.merk.detail');
        Route::put('/barang/merk/update',[BrandController::class,'update'])->name('barang.merk.update');
        Route::delete('/barang/merk/delete',[BrandController::class,'delete'])->name('barang.merk.delete');

        // customer (izin untuk staff hanya read)
        Route::get('/customer',[CustomerController::class,'index'])->name('customer');
        Route::get('/customer/list',[CustomerController::class,'list'])->name('customer.list');
        Route::post('/customer/save',[CustomerController::class,'save'])->name('customer.save');
        Route::post('/customer/detail',[CustomerController::class,'detail'])->name('customer.detail');
        Route::put('/customer/update',[CustomerController::class,'update'])->name('customer.update');
        Route::delete('/customer/delete',[CustomerController::class,'delete'])->name('customer.delete');

        // supplier (izin untuk staff hanya read)
        Route::get('/supplier',[SupplierController::class,'index'])->name('supplier');
        Route::get('/supplier/list',[SupplierController::class,'list'])->name('supplier.list');
        Route::post('/supplier/save',[SupplierController::class,'save'])->name('supplier.save');
        Route::post('/supplier/detail',[SupplierController::class,'detail'])->name('supplier.detail');
        Route::put('/supplier/update',[SupplierController::class,'update'])->name('supplier.update');
        Route::delete('/supplier/delete',[SupplierController::class,'delete'])->name('supplier.delete');
        
        // Transaksi  masuk
        Route::get('/transaksi/masuk',[TransactionInController::class,'index'])->name('transaksi.masuk');
        Route::get('/transaksi/masuk/list',[TransactionInController::class,'list'])->name('transaksi.masuk.list');
        Route::post('/transaksi/masuk/save',[TransactionInController::class,'save'])->name('transaksi.masuk.save');
        Route::post('/transaksi/masuk/detail',[TransactionInController::class,'detail'])->name('transaksi.masuk.detail');
        Route::put('/transaksi/masuk/update',[TransactionInController::class,'update'])->name('transaksi.masuk.update');
        Route::delete('/transaksi/masuk/delete',[TransactionInController::class,'delete'])->name('transaksi.masuk.delete');

        // Transaksi keluar
        Route::get('/transaksi/keluar',[TransactionOutController::class,'index'])->name('transaksi.keluar');
        Route::get('/transaksi/keluar/list',[TransactionOutController::class,'list'])->name('transaksi.keluar.list');
        Route::post('/transaksi/keluar/save',[TransactionOutController::class,'save'])->name('transaksi.keluar.save');
        Route::post('/transaksi/keluar/detail',[TransactionOutController::class,'detail'])->name('transaksi.keluar.detail');
        Route::put('/transaksi/keluar/update',[TransactionOutController::class,'update'])->name('transaksi.keluar.update');
        Route::delete('/transaksi/keluar/delete',[TransactionOutController::class,'delete'])->name('transaksi.keluar.delete');

        // Laporan Transaksi Masuk
        Route::get('/laporan/masuk',[ReportGoodsInController::class,'index'])->name('laporan.masuk');
        Route::get('/laporan/masuk/list',[ReportGoodsInController::class,'list'])->name('laporan.masuk.list');


        // Laporan Transaksi Keluar
        Route::get('/laporan/keluar',[ReportGoodsOutController::class,'index'])->name('laporan.keluar');
        Route::get('/laporan/keluar/list',[ReportGoodsOutController::class,'list'])->name('laporan.keluar.list');

        // Laporan Stok Barang
        Route::get('/laporan/stok',[ReportStockController::class,'index'])->name('laporan.stok');
        Route::get('/laporan/stok/list',[ReportStockController::class,'list'])->name('laporan.stok.list');



        // pengaturan (staff hanya mengakse pengaturan penguna)
        Route::get('/pengaturan/petugas',[StaffController::class,'index'])->name('settings.staff');
        Route::get('/pengaturan/petugas/list',[StaffController::class,'list'])->name('settings.staff.list');
        Route::post('/pengaturan/petugas/save',[StaffController::class,'save'])->name('settings.staff.save');
        Route::post('/pengaturan/petugas/detail',[StaffController::class,'detail'])->name('settings.staff.detail');
        Route::put('/pengaturan/petugas/update',[StaffController::class,'update'])->name('settings.staff.update');
        Route::delete('/pengaturan/petugas/delete',[StaffController::class,'delete'])->name('settings.staff.delete');

        // Route::get('/pengaturan/web',[WebSettingController::class,'index'])->name('settings.web');
        // Route::get('/pengaturan/web/detail',[WebSettingController::class,'detail'])->name('settings.web.detail');
        // Route::post('/pengaturan/web/detail/role',[WebSettingController::class,'detailRole'])->name('settings.web.detail.role');
        // Route::put('/pengaturan/web/update',[WebSettingController::class,'update'])->name('settings.web.update');
    });


    Route::get('/logout',[LoginController::class,'logout'])->name('login.delete');
});