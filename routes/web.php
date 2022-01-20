<?php

use App\Http\Controllers\CertificateController;
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

Route::get('pdf/create', [CertificateController::class, 'create'])->name('pdf.create');
Route::post('pdf/preview', [CertificateController::class, 'store'])->name('pdf.preview');
Route::get('pdf/generate', [CertificateController::class, 'generatePDF'])->name('pdf.generate');
Route::get('/all', [CertificateController::class, 'showAll'])->name('all');
Route::get('/download/{id}', [CertificateController::class, 'download'])->name('download');


