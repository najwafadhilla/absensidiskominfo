<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TamuController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;



// ===============================
// TAMU
// ===============================

Route::get('/', function () {
    return redirect('/tamu');
});


Route::get('/tamu', function () {
    return view('tamu');
});


Route::get('/tamu/form', function () {
    return view('tamu-form');
});


Route::post(
    '/tamu/simpan',
    [TamuController::class,'store']
);


Route::get('/tamu/sukses', function () {
    return view('tamu-sukses');
});





// ===============================
// LOGIN ADMIN
// ===============================


Route::get(
    '/login',
    [AdminController::class,'login']
);


Route::post(
    '/login',
    [AdminController::class,'prosesLogin']
);


Route::get(
    '/logout',
    [AdminController::class,'logout']
);






// ===============================
// DASHBOARD
// ===============================


Route::get(
    '/admin/dashboard',
    [AdminController::class,'dashboard']
)->name('admin.dashboard');





// ===============================
// DATA TAMU
// ===============================










// ===============================
// REKAP
// ===============================


Route::get(
    '/admin/rekap',
    [RekapController::class,'index']
);


Route::get(
    '/admin/rekap/{bidang}',
    [RekapController::class,'detail']
);


// ===============================
// LAPORAN
// ===============================


Route::get(
'/admin/laporan',
[LaporanController::class,'index']
);



/*
|--------------------------------------------------------------------------
| FILTER UTAMA
|--------------------------------------------------------------------------
*/


Route::get(
'/admin/laporan/filter',
[LaporanController::class,'filter']
);



/*
|--------------------------------------------------------------------------
| CETAK SEMUA
|--------------------------------------------------------------------------
*/


Route::get(
'/admin/laporan/semua',
[LaporanController::class,'semua']
);



/*
|--------------------------------------------------------------------------
| CETAK SEMUA PER PERIODE
|--------------------------------------------------------------------------
*/


Route::get(
'/admin/laporan/minggu',
[LaporanController::class,'minggu']
);



Route::get(
'/admin/laporan/bulan/{bulan}/{tahun}',
[LaporanController::class,'bulan']
);



Route::get(
'/admin/laporan/tahun/{tahun}',
[LaporanController::class,'tahun']
);





/*
|--------------------------------------------------------------------------
| CETAK PER BIDANG
|--------------------------------------------------------------------------
*/


Route::get(
'/admin/laporan/bidang/{bidang}',
[LaporanController::class,'bidang']
);



/*
|--------------------------------------------------------------------------
| CETAK
|--------------------------------------------------------------------------
*/


Route::get(
'/admin/laporan/cetak',
[LaporanController::class,'cetak']
);
use App\Http\Controllers\AdminTamuController;


Route::prefix('admin')->group(function(){


    // DATA TAMU
    Route::get('/tamu',
    [AdminTamuController::class,'index'])
    ->name('admin.tamu');


    // DETAIL
    Route::get('/tamu/{id}',
    [AdminTamuController::class,'show'])
    ->name('admin.tamu.show');


    // EDIT FORM
    Route::get('/tamu/{id}/edit',
    [AdminTamuController::class,'edit'])
    ->name('admin.tamu.edit');


    // UPDATE DATA
    Route::put('/tamu/{id}',
    [AdminTamuController::class,'update'])
    ->name('admin.tamu.update');


    // DELETE DATA
    Route::delete('/tamu/{id}',
    [AdminTamuController::class,'destroy'])
    ->name('admin.tamu.destroy');


});
use App\Http\Controllers\MasterBidangController;


Route::get(
'/admin/master-bidang/{bidang}',
[MasterBidangController::class,'index']
);
