<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::all();
        return view('jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('jurusan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Jurusan::create([
            'name' => $request->name
        ]);

        return redirect('/jurusan')->with('success', 'Data jurusan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Jurusan::find($id);
        return view('jurusan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->update([
            'name' => $request->name
        ]);

        return redirect('/jurusan')->with('success', 'Data jurusan berhasil diupdate');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil dihapus');
    }
}