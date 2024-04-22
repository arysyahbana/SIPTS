<?php

use App\Http\Controllers\Admin\PamongController;
use App\Http\Controllers\Auth\LoginControler;
use App\Http\Controllers\Auth\SignupController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $page = 'home';
    return view('Frontend.home', compact('page'));
})->name('home')->middleware('auth');

Route::get('/signup', [SignUpController::class, 'show'])->name('signup');
Route::post('/signup_submit', [SignUpController::class, 'store'])->name('signup_submit');
Route::get('/signup/verification/{token}/{email}', [SignUpController::class, 'verif'])->name('verif');

Route::get('/login', [LoginControler::class, 'show'])->name('login-show');
Route::post('/login-submit', [LoginControler::class, 'login_submit'])->name('login-submit');
Route::get('/logout', [LoginControler::class, 'logout'])->name('logout');

Route::get('/forget', [LoginControler::class, 'forget'])->name('forget');
Route::post('/forget/submit', [LoginControler::class, 'forget_submit'])->name('forget_submit');
Route::get('/reset-password/{token}/{email}', [LoginControler::class, 'reset_password'])->name('reset_password');
Route::post('/reset-submit', [LoginControler::class, 'reset_submit'])->name('reset_submit');

//  Menu Admin
// data Pamong
Route::get('/data-pamong', [PamongController::class, 'show'])->name('show-pamong');
Route::get('/add-pamong', [PamongController::class, 'add'])->name('add-pamong');
Route::post('store-pamong', [PamongController::class, 'store'])->name('store-pamong');
Route::get('/edit-pamong/{id}', [PamongController::class, 'edit'])->name('edit-pamong');


// data Siswa
Route::get('/data-siswa', function () {
    $page = 'data-siswa';
    return view('Frontend.Admin.dataSiswa.index', compact('page'));
})->name('show-siswa')->middleware('auth');
Route::get('/add-siswa', function () {
    $page = 'data-siswa';
    return view('Frontend.Admin.dataSiswa.add', compact('page'));
})->name('add-siswa')->middleware('auth');
Route::get('/edit-siswa', function () {
    $page = 'data-siswa';
    return view('Frontend.Admin.dataSiswa.edit', compact('page'));
})->name('edit-siswa')->middleware('auth');

//data Industri
Route::get('/data-industri', function () {
    $page = 'data-industri';
    return view('Frontend.Admin.dataIndustri.index', compact('page'));
})->name('show-industri')->middleware('auth');
Route::get('/add-industri', function () {
    $page = 'data-industri';
    return view('Frontend.Admin.dataIndustri.add', compact('page'));
})->name('add-industri')->middleware('auth');
Route::get('/edit-industri', function () {
    $page = 'data-industri';
    return view('Frontend.Admin.dataIndustri.edit', compact('page'));
})->name('edit-industri')->middleware('auth');

//data Alumni
Route::get('/data-alumni', function () {
    $page = 'data-alumni';
    return view('Frontend.Admin.dataAlumni.index', compact('page'));
})->name('show-alumni')->middleware('auth');
Route::get('/add-alumni', function () {
    $page = 'data-alumni';
    return view('Frontend.Admin.dataAlumni.add', compact('page'));
})->name('add-alumni')->middleware('auth');
Route::get('/edit-alumni', function () {
    $page = 'data-alumni';
    return view('Frontend.Admin.dataAlumni.edit', compact('page'));
})->name('edit-alumni')->middleware('auth');
// end Menu Admin


// Menu Siswa
// data Kegiatan
Route::get('/siswa/kegiatan', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.index', compact('page'));
})->name('show-kegiatan')->middleware('auth');
Route::get('/siswa/kegiatan/upload', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.add', compact('page'));
})->name('add-kegiatan')->middleware('auth');
Route::get('/siswa/kegiatan/edit', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.edit', compact('page'));
})->name('edit-kegiatan')->middleware('auth');

// penilaian
Route::get('/siswa/penilaian', function () {
    $page = 'penilaian';
    return view('Frontend.Siswa.Penilaian.index', compact('page'));
})->name('show-penilaian')->middleware('auth');
// end Menu Siswa

// Menu Pamong
// cek Kegiatan
Route::get('/pamong/cek-kegiatan', function () {
    $page = 'cek-kegiatan';
    return view('Frontend.Pamong.kegiatanSiswa.index', compact('page'));
})->name('show-cek-kegiatan')->middleware('auth');
Route::get('/pamong/cek-kegiatan/detail', function () {
    $page = 'cek-kegiatan';
    return view('Frontend.Pamong.kegiatanSiswa.detail', compact('page'));
})->name('detail-cek-kegiatan')->middleware('auth');

// input Nilai
Route::get('/pamong/input-nilai', function () {
    $page = 'input-nilai';
    return view('Frontend.Pamong.inputNilai.index', compact('page'));
})->name('show-input-nilai')->middleware('auth');
// end Menu Pamong
