<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PamongController extends Controller
{
    public function show()
    {
        $page = 'data-pamong';
        $user = User::where('role', 'Pamong')->get();
        return view('Frontend.Admin.dataPamong.index', compact('user', 'page'));
    }

    public function add()
    {
        $page = 'data-pamong';
        return view('Frontend.Admin.dataPamong.add', compact('page'));
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
        return redirect()->route('pamong-show');
    }
    public function edit($id)
    {
        $page = 'data-pamong';
        $user = User::findOrFail($id);
        return view('Frontend.Admin.dataPamong.edit', compact('page', 'user'));
    }
}
