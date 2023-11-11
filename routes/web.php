<?php

use App\Http\Controllers\Backend\AboutBpmiController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Landing\AboutController;
use App\Http\Controllers\Landing\AkreditasiController;
use App\Http\Controllers\Landing\BerandaController;
use App\Http\Controllers\Landing\BlogController;
use App\Http\Controllers\Landing\DokumenController;
use App\Http\Controllers\Landing\MonevController;
use App\Livewire\Front\Beranda;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DokumenController as BackendDokumenController;
use App\Http\Controllers\Backend\MonevController as BackendMonevController;
use App\Http\Controllers\Backend\AkreditasiController as BackendAkreditasiController;
use App\Http\Controllers\Backend\NewsController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/news', [BlogController::class, 'index'])->name('news');
Route::get('/news/{id}', [BlogController::class, 'show'])->name('news.show');

Route::get('/about/{key}', [AboutController::class, 'index']);
Route::get('/dokumen/{key}', [DokumenController::class, 'index']);
Route::get('/monev/{key}', [MonevController::class, 'index']);
Route::get('/akreditasi/{key}', [AkreditasiController::class, 'index']);


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// AUTH GROUP
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('backend.home.index');
    })->name('home');

    Route::post('/backend/file/upload', [NewsController::class, 'upload'])->name('backend.upload');

    Route::get('/backend/news/{key}', [NewsController::class, 'index'])->name('backend.news');
    Route::get('/backend/news/{key}/add', [NewsController::class, 'add'])->name('backend.news.add');
    Route::post('/backend/news/{key}/store', [NewsController::class, 'store'])->name('backend.news.store');
    Route::get('/backend/news/{key}/edit/{id}', [NewsController::class, 'edit'])->name('backend.news.edit');
    Route::post('/backend/news/{key}/update/{id}', [NewsController::class, 'update'])->name('backend.news.update');
    Route::post('/backend/news/{key}/delete/{id}', [NewsController::class, 'delete'])->name('backend.news.delete');

    Route::get('/backend/about/{key}', [AboutBpmiController::class, 'index'])->name('backend.about');
    Route::get('/backend/about/{key}/add', [AboutBpmiController::class, 'add'])->name('backend.about.add');
    Route::post('/backend/about/{key}/store', [AboutBpmiController::class, 'store'])->name('backend.about.store');
    Route::get('/backend/about/{key}/edit/{id}', [AboutBpmiController::class, 'edit'])->name('backend.about.edit');
    Route::post('/backend/about/{key}/update/{id}', [AboutBpmiController::class, 'update'])->name('backend.about.update');
    Route::post('/backend/about/{key}/delete/{id}', [AboutBpmiController::class, 'delete'])->name('backend.about.delete');


    Route::get('/backend/dokumen/{key}', [BackendDokumenController::class, 'index'])->name('backend.dokumen');
    Route::get('/backend/dokumen/{key}/add', [BackendDokumenController::class, 'add'])->name('backend.dokumen.add');
    Route::post('/backend/dokumen/{key}/store', [BackendDokumenController::class, 'store'])->name('backend.dokumen.store');
    Route::get('/backend/dokumen/{key}/edit/{id}', [BackendDokumenController::class, 'edit'])->name('backend.dokumen.edit');
    Route::post('/backend/dokumen/{key}/update/{id}', [BackendDokumenController::class, 'update'])->name('backend.dokumen.update');
    Route::post('/backend/dokumen/{key}/delete/{id}', [BackendDokumenController::class, 'delete'])->name('backend.dokumen.delete');


    Route::get('/backend/monev/{key}', [BackendMonevController::class, 'index'])->name('backend.monev');
    Route::get('/backend/monev/{key}/add', [BackendMonevController::class, 'add'])->name('backend.monev.add');
    Route::post('/backend/monev/{key}/store', [BackendMonevController::class, 'store'])->name('backend.monev.store');
    Route::get('/backend/monev/{key}/edit/{id}', [BackendMonevController::class, 'edit'])->name('backend.monev.edit');
    Route::post('/backend/monev/{key}/update/{id}', [BackendMonevController::class, 'update'])->name('backend.monev.update');
    Route::post('/backend/monev/{key}/delete/{id}', [BackendMonevController::class, 'delete'])->name('backend.monev.delete');

    Route::get('/backend/akreditasi/{key}', [BackendAkreditasiController::class, 'index'])->name('backend.akreditasi');
    Route::get('/backend/akreditasi/{key}/add', [BackendAkreditasiController::class, 'add'])->name('backend.akreditasi.add');
    Route::post('/backend/akreditasi/{key}/store', [BackendAkreditasiController::class, 'store'])->name('backend.akreditasi.store');
    Route::get('/backend/akreditasi/{key}/edit/{id}', [BackendAkreditasiController::class, 'edit'])->name('backend.akreditasi.edit');
    Route::post('/backend/akreditasi/{key}/update/{id}', [BackendAkreditasiController::class, 'update'])->name('backend.akreditasi.update');
    Route::post('/backend/akreditasi/{key}/delete/{id}', [BackendAkreditasiController::class, 'delete'])->name('backend.akreditasi.delete');
});
