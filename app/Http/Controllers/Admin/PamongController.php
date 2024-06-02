<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pamong;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PamongController extends Controller
{
    public function show()
    {
        $page = 'data-pamong';
        $user = Pamong::with('siswa')->with('user')->get();
        // return $user;
        return view('Frontend.Admin.dataPamong.index', compact('user', 'page'));
    }

    public function add()
    {
        $page = 'data-pamong';
        $data = Siswa::all();
        $pamong = User::where('role', 'Pamong')->get();
        return view('Frontend.Admin.dataPamong.add', compact('page', 'data', 'pamong'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nip' => 'required',
        //     'name' => 'required',
        // ]);
        if (empty([[$request->nip, $request->name, $request->password, $request->email]])) {
            $store = new User();
            $store->nip = $request->nip;
            $store->name = $request->name;
            $store->hp = $request->hp;
            $store->email = $request->email;
            $store->password = Hash::make($request->password);
            // $store->id_siswa = $request->namaSiswa;
            $store->role = 'Pamong';
            $store->save();

            $pamong = new Pamong();
            $pamong->id_pamong = $store->id;
            $pamong->id_siswa = $request->namaSiswa;
            $pamong->save();
        } else {
            $pamong = new Pamong();
            $pamong->id_pamong = $request->namePamong;
            $pamong->id_siswa = $request->namaSiswa2;
            $pamong->save();
        }
        return redirect()->route('show-pamong')->with('success', 'Data Berhasil Ditambah');
    }
    public function edit($id)
    {
        $page = 'data-pamong';
        $user = Pamong::with('siswa')->with('user')->findOrFail($id);
        $siswa = Siswa::all();
        return view('Frontend.Admin.dataPamong.edit', compact('page', 'user', 'siswa'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->hp = $request->hp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->id_siswa = $request->namaSiswa;
        $user->update();

        $pamong = Pamong::where([['id_siswa', $request->namaSiswa], ['id_pamong', $id]])->first();
        $pamong->id_pamong = $user->id;
        $pamong->id_siswa = $request->namaSiswa;
        $pamong->update();

        return redirect()->route('show-pamong')->with('success', 'Data berhasil diperbarui');
    }
    public function delete($id)
    {
        $user = Pamong::findOrFail($id);
        // User::where('id', $user->user->id)->delete();
        $user->delete();
        return redirect()->route('show-pamong')->with('success', 'Data Pamong berhasil dihapus');
    }
}
