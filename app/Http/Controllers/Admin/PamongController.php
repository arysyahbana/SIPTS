<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PamongController extends Controller
{
    public function show()
    {
        $page = 'data-pamong';
        $user = User::with('siswa')->where('role', 'Pamong')->get();
        return view('Frontend.Admin.dataPamong.index', compact('user', 'page'));
    }

    public function add()
    {
        $page = 'data-pamong';
        $data = Siswa::all();
        return view('Frontend.Admin.dataPamong.add', compact('page', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
        ]);

        $store = new User();
        $store->nip = $request->nip;
        $store->name = $request->name;
        $store->hp = $request->hp;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->id_siswa = $request->namaSiswa;
        $store->role = 'Pamong';
        $store->save();
        return redirect()->route('show-pamong')->with('success', 'Data Berhasil Ditambah');
    }
    public function edit($id)
    {
        $page = 'data-pamong';
        $user = User::with('siswa')->findOrFail($id);
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
        $user->id_siswa = $request->namaSiswa;
        $user->save();

        return redirect()->route('show-pamong')->with('success', 'Data berhasil diperbarui');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('show-pamong')->with('success', 'Data Pamong berhasil dihapus');
    }
}
