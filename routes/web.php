<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\DataDepartemen;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TambahSurat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PengirimSurat;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluar;
use App\Http\Controllers\SuratMasuk;
use App\Http\Controllers\TambahSuratKeluar;
use App\Http\Controllers\TambahSuratMasuk;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', function () {
    return view('login.login');
});

Route::get('home', function () {
    return view('welcome');
});

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('/login')->middleware('guest');
Route::post('/login-proses', [LoginController::class, 'authenticate'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout']);

//Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::get('/Dashboard', [LoginController::class, 'beranda'])->name('Dashboard');


Route::group(['middleware' => ['auth','ceklevel:SUPERADMIN']], function(){
    Route::get('/Databidang', [BidangController::class, 'index'])->name('Databidang');
    Route::post('/subbidang', [BidangController::class, 'submit']);
    Route::post('/upbidang', [BidangController::class, 'update']);
    Route::get('/delbidang/{idbidang}', [BidangController::class, 'delete']);

    Route::get('/Datapegawai', [DataUser::class, 'index'])->name('Datapegawai');
    Route::get('/formpegawai', [DataUser::class, 'form']);
    Route::get('/edits/{email}', [DataUser::class, 'edit']);
    Route::post('/submits', [DataUser::class, 'submit']);
    Route::post('/updateData/{email}', [DataUser::class, 'update']);
    Route::get('/deletes/{email}', [DataUser::class, 'delete'])->name('deletes');

    Route::get('/Pengirimsurat', [PengirimSurat::class, 'index'])->name('Pengirimsurat');

    Route::get('/detaildisposisi/{id}', [DisposisiController::class, 'detail'])->name('detaildisposisi.detail');
});

Route::group(['middleware' => ['auth','ceklevel:SEKERTARIAT,SUPERADMIN,ADMIN,PEGAWAI']], function(){
    Route::get('/Suratmasuk', [SuratMasuk::class, 'index'])->name('Suratmasuk');
    Route::get('/Tambahsuratmasuk', [SuratMasuk::class, 'formsuratmasuk'])->name('Tambahsuratmasuk');
    Route::post('/subsuratmasuk', [SuratMasuk::class, 'submit']);
    Route::get('/detailsuratmasuk/{idsuratmasuk}', [SuratMasuk::class, 'detail'])->name('detailsuratmasuk.detail');
    // Route::get('download-surat/{idsuratmasuk}', [SuratMasuk::class, 'download'])->name('download-surat');
    Route::get('cetak-surat-masuk', [SuratMasuk::class, 'cetak'])->name('cetak-surat-masuk');
    Route::get('print-pertanggal/{tglawal}/{tglakhir}', [SuratMasuk::class, 'pertanggal'])->name('print-pertanggal');
    Route::get('/delsuratmasuk/{idsuratmasuk}', [SuratMasuk::class, 'deleteData'])->name('delsuratmasuk');


    Route::get('/Suratkeluar', [SuratKeluar::class, 'index'])->name('Suratkeluar');
    Route::get('/Tambahsuratkeluar', [SuratKeluar::class, 'formsuratkeluar'])->name('Tambahsuratkeluar');
    Route::post('/subsuratkeluar', [SuratKeluar::class, 'submit']);
    Route::get('/detailsuratkeluar/{idsuratkeluar}', [SuratKeluar::class, 'detail'])->name('detailsuratkeluar.detail');
    Route::get('cetak-surat-keluar', [SuratKeluar::class, 'cetak'])->name('cetak-surat-keluar');
    Route::get('print-pertanggal/{tglawal}/{tglakhir}', [SuratKeluar::class, 'pertanggal'])->name('print-pertanggal');
    Route::get('/delsuratkeluar/{idsuratkeluar}', [SuratKeluar::class, 'deleteData'])->name('delsuratkeluar');

    Route::post('/subdispo', [DisposisiController::class, 'submit']);

    Route::get('/detailpegawai/{name}', [ProfileController::class, 'index'])->name('detailpegawai');
    Route::get('/my-profile/{name}', [NavbarController::class, 'index'])->name('name');

    Route::post('/update-password', [DataUser::class, 'updatePassword'])->name('update-password');
});

Route::get('/pdf', [FileController::class, 'index']);

Route::get('/upload', [FileController::class, 'showForm'])->name('show.upload.form');
Route::post('/uploadpdf', [FileController::class, 'uploadPDF'])->name('uploadpdf');

Route::get('/delete-pdf/{id}', [FileController::class, 'deletePDF'])->name('delete.pdf');