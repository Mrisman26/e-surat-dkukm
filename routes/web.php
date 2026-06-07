<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PengirimSurat;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluar;
use App\Http\Controllers\SuratMasuk;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'Login.login');
Route::view('/home', 'welcome');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login.proses', [LoginController::class, 'authenticate'])->name('login.proses');

    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register.proses');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'beranda'])
        ->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| SUPERADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'ceklevel:SUPERADMIN'])->group(function () {

    // Bidang
    Route::controller(BidangController::class)->group(function () {
        Route::get('/databidang', 'index')->name('databidang');
        Route::post('/subbidang', 'submit');
        Route::post('/upbidang', 'update');
        Route::get('/delbidang/{idbidang}', 'delete');
    });

    // Pegawai
    Route::controller(DataUser::class)->group(function () {
        Route::get('/datapegawai', 'index')->name('datapegawai');
        Route::get('/formpegawai', 'form');
        Route::get('/edits/{email}', 'edit');
        Route::post('/submits', 'submit');
        Route::post('/updateData/{email}', 'update');
        Route::get('/deletes/{email}', 'delete')->name('deletes');
    });

    Route::get('/pengirimsurat', [PengirimSurat::class, 'index'])
        ->name('pengirimsurat');

    Route::get('/detaildisposisi/{id}', [DisposisiController::class, 'detail'])
        ->name('detaildisposisi');
});

/*
|--------------------------------------------------------------------------
| ADMIN / PEGAWAI / SEKRETARIAT
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'ceklevel:SEKERTARIAT,SUPERADMIN,ADMIN,PEGAWAI'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Surat Masuk
    |--------------------------------------------------------------------------
    */

    Route::controller(SuratMasuk::class)->group(function () {
        Route::get('/suratmasuk', 'index')->name('suratmasuk');
        Route::get('/tambahsuratmasuk', 'formsuratmasuk')->name('tambahsuratmasuk');
        Route::post('/subsuratmasuk', 'submit');

        Route::get('/detailsuratmasuk/{idsuratmasuk}', 'detail')
            ->name('detailsuratmasuk');

        Route::get('/cetak-surat-masuk', 'cetak')
            ->name('cetak-surat-masuk');

        Route::get('/print-surat-masuk/{tglawal}/{tglakhir}', 'pertanggal')
            ->name('print-surat-masuk');

        Route::get('/delsuratmasuk/{idsuratmasuk}', 'deleteData')
            ->name('delsuratmasuk');
    });

    /*
    |--------------------------------------------------------------------------
    | Surat Keluar
    |--------------------------------------------------------------------------
    */

    Route::controller(SuratKeluar::class)->group(function () {
        Route::get('/suratkeluar', 'index')->name('suratkeluar');
        Route::get('/tambahsuratkeluar', 'formsuratkeluar')->name('tambahsuratkeluar');
        Route::post('/subsuratkeluar', 'submit');

        Route::get('/detailsuratkeluar/{idsuratkeluar}', 'detail')
            ->name('detailsuratkeluar');

        Route::get('/cetak-surat-keluar', 'cetak')
            ->name('cetak-surat-keluar');

        Route::get('/print-surat-keluar/{tglawal}/{tglakhir}', 'pertanggal')
            ->name('print-surat-keluar');

        Route::get('/delsuratkeluar/{idsuratkeluar}', 'deleteData')
            ->name('delsuratkeluar');
    });

    /*
    |--------------------------------------------------------------------------
    | Disposisi
    |--------------------------------------------------------------------------
    */

    Route::post('/subdispo', [DisposisiController::class, 'submit']);

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/detailpegawai/{name}', [ProfileController::class, 'index'])
        ->name('detailpegawai');

    Route::get('/my-profile/{name}', [NavbarController::class, 'index'])
        ->name('my-profile');

    Route::post('/update-password', [DataUser::class, 'updatePassword'])
        ->name('update-password');
});

/*
|--------------------------------------------------------------------------
| File PDF
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/pdf', [FileController::class, 'index']);

    Route::get('/upload', [FileController::class, 'showForm'])
        ->name('show.upload.form');

    Route::post('/uploadpdf', [FileController::class, 'uploadPDF'])
        ->name('uploadpdf');

    Route::get('/delete-pdf/{id}', [FileController::class, 'deletePDF'])
        ->name('delete.pdf');
});
