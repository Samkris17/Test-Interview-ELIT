<?php

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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/pekerjaan/add/{id}', [MahasiswaController::class, 'addJobs'])->name('pekerjaan.add');
    Route::resource('/pekerjaan', 'PekerjaanController');
    Route::get('/mahasiswa/export-excel', [MahasiswaController::class, 'export_excel'])->name('mahasiswa.export.excel');
    Route::get('/mahasiswa/dowload_pdf/{id}', [MahasiswaController::class, 'download_pdf'])->name('mahasiswa.download.pdf');
    route::resource('mahasiswa', 'MahasiswaController');
});




