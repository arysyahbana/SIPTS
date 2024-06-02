<?php

use App\Http\Controllers\Admin\PamongController;
use App\Http\Controllers\Auth\LoginControler;
use App\Http\Controllers\Auth\SignupController;
use App\Models\Industri;
use App\Models\Kegiatan;
use App\Models\Mentor;
use App\Models\Pamong;
use App\Models\Penilaian;
use App\Models\Sertifikat;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $akun->hp = $data['hp'];
    $akun->id_siswa = $siswa->id;
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
    $user = User::where('email', $siswa->email)->first();
    $user->role = 'Alumni';
    $user->update();

    return redirect()->route('show-siswa')->with('success', 'Status siswa berhasil diubah menjadi Alumni');
})
    ->name('alumni-siswa')
    ->middleware('auth');

//data Industri
Route::get('/data-industri', function () {
    $page = 'data-industri';
    $data = Mentor::with(['siswa', 'industri', 'user'])->get();
    return view('Frontend.Admin.dataIndustri.index', compact('page', 'data'));
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
    $user->update();

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
    $kegiatan = Kegiatan::where('id_siswa', Auth::user()->id_siswa)->get();
    // dd( $kegiatan);
    return view('Frontend.Siswa.Kegiatan.index', compact('page', 'kegiatan'));
})
    ->name('show-kegiatan')
    ->middleware('auth');
Route::get('/siswa/kegiatan/upload', function () {
    $page = 'kegiatan';
    return view('Frontend.Siswa.Kegiatan.add', compact('page'));
})
    ->name('add-kegiatan')
    ->middleware('auth');
Route::post('/siswa/kegiatan/upload/store', function (Request $request) {
    $page = 'kegiatan';
    $kegiatan = new Kegiatan();
    $kegiatan->id_siswa = Auth::user()->id_siswa;
    $kegiatan->kehadiran = $request->kehadiran;
    $kegiatan->tanggal = $request->tanggal;
    // return $kegiatan;
    $kegiatan->judul = $request->judul;
    $kegiatan->deskripsi = $request->deskripsi;
    // Handle file upload
    if ($request->hasFile('foto')) {
        $ext = $request->file('foto')->extension();
        $final = Auth::user()->name . '_' . time() . '.' . $ext;
        $request->file('foto')->move(public_path('uploads/kegiatan/' . Auth::user()->name . '/'), $final);
        $kegiatan->foto = $final;
    }
    $kegiatan->save();

    return redirect()->route('show-kegiatan')->with('success', 'Data Berhasil Ditambah');
})
    ->name('store-kegiatan')
    ->middleware('auth');
Route::get('/siswa/kegiatan/edit/{id}', function ($id) {
    $page = 'kegiatan';
    $edit = Kegiatan::where('id', $id)->first();
    // return $edit->tanggal;
    return view('Frontend.Siswa.Kegiatan.edit', compact('page', 'edit'));
})
    ->name('edit-kegiatan')
    ->middleware('auth');

// update kegiatan
Route::post('/siswa/kegiatan/update/{id}', function (Request $request, $id) {
    $page = 'kegiatan';
    $kegiatan = Kegiatan::find($id);

    // Periksa apakah catatan tersebut ada
    if ($kegiatan) {
        // Perbarui atribut dengan nilai baru
        $kegiatan->kehadiran = $request->kehadiran;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->judul = $request->judul;
        $kegiatan->deskripsi = $request->deskripsi;

        // Tangani unggah file jika file baru disediakan
        // return $request->file('foto');
        if ($request->hasFile('foto')) {
            // Hapus file yang sudah ada
            // return 'asdas';
            if ($kegiatan->foto) {
                $filePath = public_path('uploads/kegiatan/' . Auth::user()->name . '/' . $kegiatan->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Unggah file baru
            $ext = $request->file('foto')->extension();
            $final = Auth::user()->name . '_' . time() . '.' . $ext;
            $request->file('foto')->move(public_path('uploads/kegiatan/' . Auth::user()->name . '/'), $final);
            $kegiatan->foto = $final;
        }
    }

    $kegiatan->update();
    return redirect()->route('show-kegiatan')->with('success', 'Data Berhasil Diupdate');
})
    ->name('update-kegiatan')
    ->middleware('auth');

// delete kegiatan
Route::get('/siswa/kegiatan/delete/{id}', function ($id) {
    $page = 'kegiatan';
    $edit = Kegiatan::where('id', $id)->first();
    $filePath = public_path('uploads/kegiatan/' . Auth::user()->name . '/' . $edit->foto);
    unlink($filePath);
    $edit->delete();
    return back()->with('success', 'data berhasil dihapus');
})
    ->name('delete-kegiatan')
    ->middleware('auth');

// penilaian
Route::get('/siswa/penilaian', function () {
    $page = 'penilaian';
    $idAkunSiswa = Auth::user()->id_siswa;
    // $idSiswa = User::with('siswa')->where('id',$idAkunSiswa)->first();
    $penilaian = Penilaian::where('id_siswa', $idAkunSiswa)->get();
    $sertifikat = Sertifikat::where('id_siswa', $idAkunSiswa)->first();
    $pamong = Pamong::with('user')->where('id_siswa', $idAkunSiswa)->first();
    $mentor = Mentor::with('user')->where('id_siswa', $idAkunSiswa)->first();
    // return $pamong->user->name;
    return view('Frontend.Siswa.Penilaian.index', compact('page', 'penilaian', 'sertifikat','pamong','mentor'));
})
    ->name('show-penilaian')
    ->middleware('auth');

// download sertifikat
Route::get('/siswa/download/sertifikat', function () {
    $page = 'penilaian';
    $sertifikat = Sertifikat::where('id_siswa', Auth::user()->id_siswa)->first();
    $file_path = public_path('uploads/sertifikat/' . $sertifikat->nama_sertifikat);
    $file_name = $sertifikat->nama_sertifikat;
    return response()->download($file_path, $file_name);

    // return view('Frontend.Siswa.Penilaian.index', compact('page', 'penilaian'));
})
    ->name('download-sertifikat')
    ->middleware('auth');

// profile
Route::get('/Siswa/update-profile', function () {
    $page = 'home';
    $siswa = Siswa::where('email', Auth::user()->email)->first();
    return view('Frontend.Siswa.editProfile', compact('page', 'siswa'));
})
    ->name('update-profile-siswa')
    ->middleware('auth');

Route::post('/Siswa/updateProfile/{id}', function (Request $request, $id) {
    $dataUser = Auth::user();
    $user = User::find($dataUser->id);
    $siswa = Siswa::where('email', Auth::user()->email)->first();
    $user->name = $request->name;
    $siswa->nama = $request->name;
    $siswa->nis = $request->nis;
    $user->email = $request->email;
    $siswa->email = $request->email;
    $user->hp = $request->hp;
    $siswa->no_hp = $request->hp;

    // Handle file upload
    if ($request->hasFile('foto')) {
        $ext = $request->file('foto')->extension();
        $final = $request->name . '_' . time() . '.' . $ext;
        $request->file('foto')->move(public_path('uploads/foto/' . '/'), $final);
        $siswa->foto = $final;
    }

    // Save the updated records
    $user->save();
    $siswa->save();
    return redirect()->route('home')->with('success', 'data berhasil diupdate');
})
    ->name('update-profile-siswa2')
    ->middleware('auth');
// end Menu Siswa

// Menu Pamong
// cek Kegiatan
Route::get('/pamong/cek-kegiatan', function () {
    $page = 'cek-kegiatan';
    $pamong = Auth::user();
    $dataPamong = Pamong::with('siswa')
        ->where('id_pamong', $pamong->id)
        ->get();
    return view('Frontend.Pamong.kegiatanSiswa.index', compact('page', 'dataPamong'));
})
    ->name('show-cek-kegiatan')
    ->middleware('auth');
Route::get('/pamong/cek-kegiatan/detail/{id}', function ($id) {
    $page = 'cek-kegiatan';
    $kegiatan = Kegiatan::where('id_siswa', $id)->get();
    $siswa = Siswa::find($id);
    return view('Frontend.Pamong.kegiatanSiswa.detail', compact('page', 'kegiatan', 'siswa'));
})
    ->name('pamong-detail-cek-kegiatan')
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
Route::get('/Alumni/edit-profile', function () {
    $page = 'home';
    $dataSiswa = Siswa::where('email', Auth::user()->email)->first();
    return view('Frontend.Alumni.editProfile', compact('page', 'dataSiswa'));
})
    ->name('edit-profile-alumni')
    ->middleware('auth');

Route::post('/Alumni/update-profile', function (Request $request) {
    $page = 'home';
    $data = $request->all();
    $dataSiswa = Siswa::where('email', Auth::user()->email)->first();
    $dataSiswa->nis = $data['nis'];
    $dataSiswa->nama = $data['name'];
    $dataSiswa->email = $data['email'];
    $dataSiswa->no_hp = $data['hp'];
    $dataSiswa->status_pekerjaan = $data['bekerja'];
    $dataSiswa->tempat = $data['tempat'];

    $dataSiswa->update();

    $akun = User::where('id', Auth::user()->id)->first();
    $akun->name = $data['name'];
    $akun->email = $data['email'];
    $akun->hp = $data['hp'];
    if (!$data['password']) {
        $akun->password = Hash::make($data['password']);
    }
    $akun->update();
    return redirect()->route('home')->with('success', 'Data Berhasil Diupdate');
})
    ->name('update-profile-alumni')
    ->middleware('auth');
// end Menu Alumni

// Menu Mentor
Route::get('/mentor/cek-kegiatan', function () {
    $page = 'cek-kegiatan';
    $mentor = Auth::user();
    $dataMentor = Mentor::with('siswa')
        ->where('id_mentor', $mentor->id)
        ->get();
    // $dataSiswa
    // return $dataMentor;
    return view('Frontend.Mentor.kegiatanSiswa.index', compact('page', 'dataMentor'));
})
    ->name('mentor-show-cek-kegiatan')
    ->middleware('auth');
Route::get('/mentor/cek-kegiatan/detail/{id}', function ($id) {
    $page = 'cek-kegiatan';
    $kegiatan = Kegiatan::with('siswa')->where('id_siswa', $id)->get();
    // return $kegiatan;
    $siswa = Siswa::find($id);
    return view('Frontend.Mentor.kegiatanSiswa.detail', compact('page', 'kegiatan', 'siswa'));
})
    ->name('mentor-detail-cek-kegiatan')
    ->middleware('auth');

// input Nilai
Route::get('/mentor/data-siswa', function () {
    $page = 'input-nilai';
    $mentor = Auth::user();
    $dataMentor = Mentor::with('siswa')
        ->where('id_mentor', $mentor->id)
        ->get();
    return view('Frontend.Mentor.inputNilai.index', compact('page', 'dataMentor'));
})
    ->name('mentor-show-input-nilai')
    ->middleware('auth');

Route::get('/mentor/data-siswa/input-nilai/{id}/{id2}', function ($id, $id2) {
    $page = 'input-nilai';
    $siswa = Siswa::find($id);
    $penilaian = Penilaian::where([['id_siswa', $id], ['id_mentor', $id2]])->get();
    $sertifikat = Sertifikat::where([['id_siswa', $id], ['id_mentor', $id2]])->first();
    return view('Frontend.Mentor.inputNilai.detail', compact('page', 'siswa', 'penilaian', 'sertifikat'));
})
    ->name('mentor-showed-input-nilai')
    ->middleware('auth');

Route::post('/mentor/data-siswa/input-nilai/store/{id}', function (Request $request, $id) {
    $page = 'input-nilai';
    $store = new Penilaian();
    $store->id_siswa = $id;
    $store->id_mentor = Auth::user()->id;
    $store->nilai = $request->nilai;
    $store->aspek_penilaian = $request->aspek;
    $store->save();
    return back()->with('success', 'data berhasil ditambah');
})
    ->name('mentor-showed-input-nilai-store')
    ->middleware('auth');

Route::post('/mentor/data-siswa/input-nilai/update/{id}', function (Request $request, $id) {
    $page = 'input-nilai';
    $update = Penilaian::where('id', $id)->first();
    $update->nilai = $request->nilai;
    $update->aspek_penilaian = $request->aspek;
    // return $update;
    $update->update();
    return back()->with('success', 'data berhasil diedit');
})
    ->name('mentor-showed-input-nilai-update')
    ->middleware('auth');

Route::get('/mentor/data-siswa/delete/{id}', function ($id) {
    $page = 'input-nilai';
    Penilaian::find($id)->delete();
    return back()->with('success', 'data berhasil dihapus');
})
    ->name('mentor-showed-input-nilai-delete')
    ->middleware('auth');

Route::post('/mentor/data-siswa/sertifikat/{id2}/{id}', function (Request $request, $id2, $id) {
    $page = 'input-nilai';
    $industri = Mentor::with('industri')->where('id_mentor', $id)->first();
    $siswa = Siswa::where('id', $id2)->first();
    $cekData = Sertifikat::where([['id_siswa', $id2], ['id_mentor', $id]])->first();

    $sertifikatData = [
        'id_mentor' => $id,
        'id_siswa' => $id2,
    ];

    if ($request->hasFile('sertifikat')) {
        // If there's an existing certificate, delete the old file
        if ($cekData && $cekData->nama_sertifikat) {
            $filePath = public_path('uploads/sertifikat/' . $cekData->nama_sertifikat);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Generate new file name and move the uploaded file
        $ext = $request->file('sertifikat')->extension();
        $final = 'Sertifikat ' . $siswa->nama . ' (' . $industri->industri->nama_perusahaan . ').' . $ext;
        $request->file('sertifikat')->move(public_path('uploads/sertifikat/'), $final);
        $sertifikatData['nama_sertifikat'] = $final;
    }

    // Update or create the certificate record
    Sertifikat::updateOrCreate(['id_siswa' => $id2, 'id_mentor' => $id], $sertifikatData);

    return back()->with('success', 'Sertifikat Berhasil Diupload');
})
    ->name('mentor-upload-sertifikat')
    ->middleware('auth');
// end Menu Mentor

// Menu Industri
// Data Perusahaan
Route::get('/industri/data-perusahaan', function () {
    $page = 'perusahaan';
    $industri = Industri::where('id_industri', Auth::user()->id)->first();
    return view('Frontend.Industri.dataPerusahaan.index', compact('page', 'industri'));
})->name('industri-data-perusahaan');
Route::get('/industri/edit-data-perusahaan/{id}', function () {
    $page = 'perusahaan';
    $industri = Industri::where('id_industri', Auth::user()->id)->first();
    return view('Frontend.Industri.dataPerusahaan.edit', compact('page', 'industri'));
})->name('edit-industri-data-perusahaan');

Route::post('/industri/store-data-perusahaan/{id}', function (Request $request, $id) {
    $industri = new Industri();
    $data = $request->all();
    $industri->id_industri = Auth::user()->id;
    $industri->mou = $data['mou'];
    $industri->nama_perusahaan = $data['name'];
    $industri->alamat = $data['alamat'];
    $industri->np_hp = $data['hp'];
    $industri->email = $data['email'];
    $industri->save();
    return redirect()->route('industri-data-perusahaan')->with('success', 'data berhasil diupdate');
})->name('store-industri-data-perusahaan');
// end Data Perusahaan

// Data Mentor
Route::get('/industri/data-mentor', function () {
    $page = 'mentor';
    $dataUser = Mentor::where('id_industri', Auth::user()->id)->get();
    $data = [];

    foreach ($dataUser as $item) {
        $dataUser = User::where('id', $item->id_mentor)->first();
        $dataSiswa = Siswa::where('id', $item->id_siswa)->first();
        $dataMentor = Mentor::where('id', $item->id)->first();
        $data[] = [
            'user' => $dataUser,
            'mentor' => $dataMentor,
            'siswa' => $dataSiswa,
        ];
    }
    // dd($data);die;
    return view('Frontend.Industri.dataMentor.index', compact('page', 'data'));
})->name('industri-data-mentor');
Route::get('/industri/add-data-mentor', function () {
    $page = 'mentor';
    $dataSiswa = Siswa::all();
    $data = Mentor::where('id_industri', Auth::user()->id)->get();
    // foreach ($data as $item) {
    //     $dataMentor[] = User::where('id', $item->id_mentor)->first();
    // }
    // dd($dataMentor);die;
    // return $data;
    return view('Frontend.Industri.dataMentor.add', compact('page', 'dataSiswa','data'));
})->name('add-industri-data-mentor');

Route::post('/industri/store-data-mentor', function (Request $request) {
    if ($request->name2 == null) {
        $mentor = new User();
        $mentor->name = $request->name;
        $mentor->email = $request->email;
        $mentor->hp = $request->hp;
        $mentor->role = 'Mentor';
        $mentor->id_siswa = $request->namaSiswa;
        $mentor->password = Hash::make($request->password);
        $mentor->save();
    } else {
        $mentor = User::findOrFail($request->name2);
    }

    $dataMentor = new Mentor();
    $dataMentor->id_mentor = $mentor->id;
    $dataMentor->id_siswa = $request->namaSiswa;
    $dataMentor->id_industri = Auth::user()->id;
    $dataMentor->save();

    return redirect('/industri/data-mentor')->with('success', 'Data mentor berhasil disimpan.');
})->name('store-industri-data-mentor');

Route::get('/industri/edit-data-mentor/{id1}/{id2}', function ($id1, $id2) {
    $page = 'mentor';
    $dataSiswa = Siswa::findOrFail($id1);
    $dataMentor = User::findOrFail($id2);
    $dataMentorAll = Mentor::with('user')
        ->where('id_industri', Auth::user()->id)
        ->get();
    $dataSiswaAll = Siswa::with('user')->get();
    // dd($dataMentorAll);die;
    return view('Frontend.Industri.dataMentor.edit', compact('page', 'dataSiswa', 'dataMentor', 'dataMentorAll', 'dataSiswaAll'));
})->name('edit-industri-data-mentor');

Route::post('/industri/update-data-mentor/{id1}/{id2}', function (Request $request, $id1, $id2) {
    $dataMentorAll = Mentor::with('user')->where('id_siswa', $id1)->where('id_mentor', $id2)->first();
    $dataMentorAll->id_mentor = $request->input('nameMentor');
    $dataMentorAll->id_siswa = $request->input('namaSiswa');
    $dataMentorAll->update();
    $dataMentor = User::findOrFail($id2);
    $dataMentor->hp = $request->input('hp');
    $dataMentor->email = $request->input('email');
    if ($request->filled('password')) {
        $dataMentor->password = Hash::make($request->input('password'));
    }
    $dataMentor->update();
    return redirect('/industri/data-mentor')->with('success', 'Data mentor berhasil diperbarui.');
})->name('update-industri-data-mentor');

Route::get('/industri/delete-data-mentor/{id}', function ($id) {
    $mentor = Mentor::findOrFail($id);
    $mentor->delete();
    return redirect('/industri/data-mentor')->with('success', 'Data mentor berhasil dihapus.');
})->name('delete-industri-data-mentor');

// end Data Mentor
// end Menu Industri
// end Menu Industri
