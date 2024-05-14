<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('kelas.index', compact('data'));
    }

    public function create()
    {
        return view('kelas.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Kelas::create([
            'name' => $request->name
        ]);

        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kelas::find($id);
        return view('kelas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update([
            'name' => $request->name
        ]);

        return redirect('/kelas')->with('success', 'Data kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus');
    }
}