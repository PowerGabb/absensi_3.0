<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $izin = Absen::where('status', 'izin')->count();
        $hadir = Absen::where('status', 'masuk')->count();
        $sakit = Absen::where('status', 'sakit')->count();
        $alfa = Absen::where('status', 'alfa')->count();
        return view('dashboard', compact('izin', 'hadir', 'sakit', 'alfa'));
    }
}
