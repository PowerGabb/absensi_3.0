<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\JamKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){

        $jam_kerja = JamKerja::first();
        return view('client.index', compact('jam_kerja'));
    }

    public function absenku(){

        $data = Absen::where('user_id', auth()->user()->id)->get();
        return view('client.absenku', compact('data'));
    }

    public function masuk(Request $request){

        $existingAbsen = Absen::where('user_id', auth()->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if($existingAbsen){
            return redirect()->back();
        }

        $data = Absen::create([
            'user_id' => auth()->user()->id,
            'jam_masuk' => Carbon::now(),
            'status' => 'masuk'
        ]);

        return redirect()->back();
    }

    public function keluar(Request $request){

        $absen = Absen::where('user_id', auth()->user()->id)
            ->whereNotIn('status', ['sakit', 'izin'])
            ->latest()
            ->first();

        $absen->update([
            'jam_pulang' => Carbon::now(),
            'status' => 'pulang'
        ]);

        return redirect()->back();
    }

    public function pengajuanSakit(){        
        return view('client.sakit-form');
    }

    public function simpanSakit(Request $request){
        Absen::create([
            'user_id' => Auth::user()->id,
            'status' => "sakit",
            'catatan' => $request->catatan
        ]);

        return redirect('/absenku');
    }

    public function pengajuanIzin(){        
        return view('client.izin-form');
    }

    public function simpanIzin(Request $request){
        Absen::create([
            'user_id' => Auth::user()->id,
            'status' => "izin",
            'catatan' => $request->catatan
        ]);

        return redirect('/absenku');
    }

    public function detail($id){

        $data = Absen::where('id', $id)->first();
        return view('absensi.detail', compact('data'));
    }


}
