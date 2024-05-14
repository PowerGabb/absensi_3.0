<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $data = User::with(['jurusan', 'kelas'])->get();
        // dd($data);
        return view('users.index', compact('data'));
    }

    public function create(){

        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('users.form', compact('jurusan', 'kelas'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'nisn' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jurusans_id' => 'required',
            'kelas_id' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => $request->password,
            'jurusans_id' => $request->jurusans_id,
            'kelas_id' => $request->kelas_id,
            'level' => "siswa"
        ]);

        return redirect('/siswa')->with('success', 'Data user berhasil ditambahkan');
    }

    public function edit($id){
        
        $data = User::find($id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('users.edit', compact('data', 'jurusan', 'kelas'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => $request->password,
            'jurusans_id' => $request->jurusans_id,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect('/siswa')->with('success', 'Data user berhasil diupdate');
    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        return redirect('/siswa')->with('success', 'Data user berhasil dihapus');
    }
}
