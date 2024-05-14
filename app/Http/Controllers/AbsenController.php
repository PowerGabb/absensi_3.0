<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\JamKerja;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function sakit (){

        $data = Absen::where('status','sakit')->get();
        return view ('absensi.sakit', compact('data'));
    }

    public function izin (){

        $data = Absen::where('status','izin')->get();
        return view ('absensi.izin', compact('data'));
    }

    public function rekap(){

        $data = Absen::latest()->get();
        return view ('absensi.rekap', compact('data'));
    }

    public function jam(){

        $data = JamKerja::latest()->first();
        return view ('jam.index', compact('data'));
    }

    public function jamEdit(){

        $data = JamKerja::latest()->first();
        return view ('jam.edit', compact('data'));
    }

    public function jamUpdate(Request $request){

        $data = JamKerja::latest()->first();
        $data->update(
            [
                "jam_kerja" => $request->jam
            ]
        );

        return redirect('/jam');
    }
}
