<?php

use App\Http\Controllers\Admin\PamongController;
use App\Http\Controllers\Auth\LoginControler;
use App\Http\Controllers\Auth\SignupController;
use App\Models\Mentor;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
})
    ->name('home')
    ->middleware('auth');

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
Route::put('/update-pamong/{id}', [PamongController::class, 'update'])->name('update-pamong');
Route::delete('/delete-pamong/{id}', [PamongController::class, 'delete'])->name('delete-pamong');

// data Siswa
Route::get('/data-siswa', function () {
    $page = 'data-siswa';
    $data = Siswa::where('status_murid', 'Murid')->get();
    return view('Frontend.Admin.dataSiswa.index', compact('page', 'data'));
})
    ->name('show-siswa')
    ->middleware('auth');
Route::get('/add-siswa', function () {
    $page = 'data-siswa';
    return view('Frontend.Admin.dataSiswa.add', compact('page'));
})
    ->name('add-siswa')
    ->middleware('auth');
Route::post('/store-siswa', function (Request $request) {
    $data = $request->all();
    $siswa = new Siswa();
    $siswa->nis = $data['nis'];
    $siswa->nama = $data['name'];
    $siswa->email = $data['email'];
    $siswa->no_hp = $data['hp'];
    $siswa->jenis_kelamin = $data['gender'];
    $siswa->bidang_keahlian = $data['bidang'];
    $siswa->program_keahlian = $data['program'];
    $siswa->konsentrasi_keahlian = $data['konsentrasi'];
    $siswa->nama_perusahaan = $data['namaPerusahaan'];
    $siswa->mentor = $data['mentor'];
    $siswa->pamong = $data['namaPamong'];
    $siswa->status_murid = 'Murid';
    $siswa->save();

    $akun = new User();
    $akun->name = $data['name'];
    $akun->email = $data['email'];
    $akun->password = Hash::make($data['password']);
    $akun->role = 'Siswa';
    $akun->save();

    return redirect()->route('show-siswa')->with('success', 'Data Berhasil Ditambah');
})
    ->name('store-siswa')
    ->middleware('auth');
Route::get('/edit-siswa/{id}', function ($id) {
    $page = 'data-siswa';
    $data = Siswa::findOrFail($id);
    return view('Frontend.Admin.dataSiswa.edit', compact('page', 'data'));
})
    ->name('edit-siswa')
    ->middleware('auth');
Route::post('/update-siswa/{id}', function (Request $request, $id) {
    $data = $request->all();
    $siswa = Siswa::findOrFail($id);
    $siswa->nis = $data['nis'];
    $siswa->nama = $data['name'];
    $siswa->email = $data['email'];
    $siswa->no_hp = $data['hp'];
    $siswa->jenis_kelamin = $data['gender'];
    $siswa->bidang_keahlian = $data['bidang'];
    $siswa->program_keahlian = $data['program'];
    $siswa->konsentrasi_keahlian = $data['konsentrasi'];
    $siswa->nama_perusahaan = $data['namaPerusahaan'];
    $siswa->mentor = $data['mentor'];
    $siswa->pamong = $data['namaPamong'];
    $siswa->save();

    return redirect()->route('show-siswa')->with('success', 'Data Berhasil Diupdate');
})
    ->name('update-siswa')
    ->middleware('auth');
Route::get('/delete-siswa/{id}', function ($id) {
    $siswa = Siswa::findOrFail($id);
    $siswa->delete();
    return redirect()->route('show-siswa')->with('success', 'Data Siswa Berhasil Dihapus');
})
    ->name('delete-siswa')
    ->middleware('auth');
Route::get('/alumni-siswa/{id}', function ($id) {
    $siswa = Siswa::findOrFail($id);
    $siswa->status_murid = 'Alumni';
    $siswa->update();

    return redirect()->route('show-siswa')->with('success', 'Status siswa berhasil diubah menjadi Alumni');
})
    ->name('alumni-siswa')
    ->middleware('auth');

//data Industri
Route::get('/data-industri', function () {
    $page = 'data-industri';
    return view('Frontend.Admin.dataIndustri.index', compact('page'));
})
    ->name('show-industri')
    ->middleware('auth');
Route::get('/add-industri', function () {
    $page = 'data-industri';
    return view('Frontend.Admin.dataIndustri.add', compact('page'));
})
    ->name('add-industri')
    ->middleware('auth');
Route::get('/edit-industri', function () {
    $page = 'data-industri';
    return view('Frontend.Admin.dataIndustri.edit', compact('page'));
})
    ->name('edit-industri')
    ->middleware('auth');

//data Alumni
Route::get('/data-alumni', function () {
    $page = 'data-alumni';
    $data = Siswa::where('status_murid', 'Alumni')->get();
    return view('Frontend.Admin.dataAlumni.index', compact('page', 'data'));
})
    ->name('show-alumni')
    ->middleware('auth');
Route::get('/add-alumni', function () {
    $page = 'data-alumni';
    return view('Frontend.Admin.dataAlumni.add', compact('page'));
})
    ->name('add-alumni')
    ->middleware('auth');
Route::get('/edit-alumni', function () {
    $page = 'data-alumni';
    return view('Frontend.Admin.dataAlumni.edit', compact('page'));
})
    ->name('edit-alumni')
    ->middleware('auth');

// data User
Route::get('/data-user', function () {
    $page = 'data-user';
    $data = User::where('role', '!=', 'siswa')->get();
    return view('Frontend.Admin.dataUser.index', compact('page', 'data'));
})
    ->name('show-user')
    ->middleware('auth');

Route::get('/add-user', function () {
    $page = 'data-user';
    return view('Frontend.Admin.dataUser.add', compact('page'));
})
    ->name('add-user')
    ->middleware('auth');

Route::post('/store-user', function (Request $request) {
    $data = $request->all();
    $user = new User();
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = Hash::make($data['password']);
    $user->role = $data['role'];
    $user->hp = $data['hp'];
    $user->save();

    return redirect()->route('show-user')->with('success', 'User berhasil ditambahkan');
})
    ->name('store-user')
    ->middleware('auth');
Route::get('/edit-user/{id}', function ($id) {
    $page = 'data-user';
    $data = User::findOrFail($id);
    return view('Frontend.Admin.dataUser.edit', compact('page', 'data'));
})
    ->name('edit-user')
    ->middleware('auth');
Route::post('/update-user/{id}', function (Request $request, $id) {
    $data = $request->all();
    $user = User::findOrFail($id);
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = Hash::make($data['password']);
    $user->role = $data['role'];
    $user->hp = $data['hp'];
    $user->save();

    return redirect()->route('show-user')->with('success', 'User berhasil diperbarui');
})
    ->name('update-user')
    ->middleware('auth');

Route::get('/delete-user/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('show-user')->with('success', 'User berhasil dihapus');
})
    ->name('delete-user')
    ->middleware('auth');

// end Menu Admin

// Menu Siswa
// data Kegiatan
Route::get('/siswa/kegiatan', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.index', compact('page'));
})
    ->name('show-kegiatan')
    ->middleware('auth');
Route::get('/siswa/kegiatan/upload', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.add', compact('page'));
})
    ->name('add-kegiatan')
    ->middleware('auth');
Route::get('/siswa/kegiatan/edit', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.edit', compact('page'));
})
    ->name('edit-kegiatan')
    ->middleware('auth');

// penilaian
Route::get('/siswa/penilaian', function () {
    $page = 'penilaian';
    return view('Frontend.Siswa.Penilaian.index', compact('page'));
})
    ->name('show-penilaian')
    ->middleware('auth');

// profile
Route::get('/Siswa/update-profile', function () {
    $page = 'home';
    return view('Frontend.Siswa.editProfile', compact('page'));
})
    ->name('update-profile-siswa')
    ->middleware('auth');
// end Menu Siswa

// Menu Pamong
// cek Kegiatan
Route::get('/pamong/cek-kegiatan', function () {
    $page = 'cek-kegiatan';
    return view('Frontend.Pamong.kegiatanSiswa.index', compact('page'));
})
    ->name('show-cek-kegiatan')
    ->middleware('auth');
Route::get('/pamong/cek-kegiatan/detail', function () {
    $page = 'cek-kegiatan';
    return view('Frontend.Pamong.kegiatanSiswa.detail', compact('page'));
})
    ->name('detail-cek-kegiatan')
    ->middleware('auth');

// input Nilai
Route::get('/pamong/data-siswa', function () {
    $page = 'input-nilai';
    return view('Frontend.Pamong.inputNilai.index', compact('page'));
})
    ->name('show-input-nilai')
    ->middleware('auth');
Route::get('/pamong/data-siswa/input-nilai', function () {
    $page = 'input-nilai';
    return view('Frontend.Pamong.inputNilai.detail', compact('page'));
})
    ->name('showed-input-nilai')
    ->middleware('auth');
// end Menu Pamong

// Menu Alumni
Route::get('/Alumni/update-profile', function () {
    $page = 'home';
    return view('Frontend.Alumni.editProfile', compact('page'));
})
    ->name('update-profile-alumni')
    ->middleware('auth');
// end Menu Alumni

// Menu Mentor
Route::get('/mentor/cek-kegiatan', function () {
    $page = 'cek-kegiatan';
    return view('Frontend.Mentor.kegiatanSiswa.index', compact('page'));
})
    ->name('mentor-show-cek-kegiatan')
    ->middleware('auth');
Route::get('/mentor/cek-kegiatan/detail', function () {
    $page = 'cek-kegiatan';
    return view('Frontend.Mentor.kegiatanSiswa.detail', compact('page'));
})
    ->name('mentor-detail-cek-kegiatan')
    ->middleware('auth');

// input Nilai
Route::get('/mentor/data-siswa', function () {
    $page = 'input-nilai';
    return view('Frontend.Mentor.inputNilai.index', compact('page'));
})
    ->name('mentor-show-input-nilai')
    ->middleware('auth');
Route::get('/mentor/data-siswa/input-nilai', function () {
    $page = 'input-nilai';
    return view('Frontend.Mentor.inputNilai.detail', compact('page'));
})
    ->name('mentor-showed-input-nilai')
    ->middleware('auth');
// end Menu Mentor

// Menu Industri
// Data Perusahaan
Route::get('/industri/data-perusahaan', function () {
    $page = 'perusahaan';
    return view('Frontend.Industri.dataPerusahaan.index', compact('page'));
})->name('industri-data-perusahaan');
Route::get('/industri/edit-data-perusahaan', function () {
    $page = 'perusahaan';
    return view('Frontend.Industri.dataPerusahaan.edit', compact('page'));
})->name('edit-industri-data-perusahaan');
// end Data Perusahaan

// Data Mentor
Route::get('/industri/data-mentor', function () {
    $page = 'mentor';
    // $dataUser = Mentor::where('id_industri', Auth::user()->id)->get();
    // foreach ($dataUser as $item) {
    //     $dataMentor = User::where('id', $item->id_mentor)->first();
    //     $dataSiswa = Siswa::where('id', $item->id_siswa)->first();
    // }
    // dd($item);die;
    $dataUser = Mentor::where('id_industri', Auth::user()->id)->get();
    $data = [];

    foreach ($dataUser as $item) {
        $dataMentor = User::where('id', $item->id_mentor)->first();
        $dataSiswa = Siswa::where('id', $item->id_siswa)->first();

        $data[] = [
            'mentor' => $dataMentor,
            'siswa' => $dataSiswa,
        ];
    }
    return view('Frontend.Industri.dataMentor.index', compact('page', 'data'));
})->name('industri-data-mentor');
Route::get('/industri/add-data-mentor', function () {
    $page = 'mentor';
    $dataSiswa = Siswa::all();
    return view('Frontend.Industri.dataMentor.add', compact('page', 'dataSiswa'));
})->name('add-industri-data-mentor');
Route::post('/industri/store-data-mentor', function (Request $request) {
    $mentor = new User();
    $mentor->name = $request->name;
    $mentor->email = $request->email;
    $mentor->hp = $request->hp;
    $mentor->id_siswa = $request->namaSiswa;
    $mentor->password = Hash::make($request->password);
    $mentor->save();

    $dataMentor = new Mentor();
    $dataMentor->id_mentor = $mentor->id;
    $dataMentor->id_siswa = $request->namaSiswa;
    $dataMentor->id_industri = Auth::user()->id;
    $dataMentor->save();

    return redirect('/industri/data-mentor')->with('success', 'Data mentor berhasil disimpan.');
})->name('store-industri-data-mentor');

Route::get('/industri/edit-data-mentor', function () {
    $page = 'mentor';
    return view('Frontend.Industri.dataMentor.edit', compact('page'));
})->name('edit-industri-data-mentor');
// end Data Mentor
// end Menu Industri
