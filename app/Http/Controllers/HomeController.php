<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = Pay::select('id_siswi', DB::raw('SUM(jumlah_bayar) as jumlah_bayar'), DB::raw('MAX(tanggal_bayar) as tanggal_bayar'))
        ->groupBy('id_siswi')
        ->orderBy('id_siswi', 'asc')
        ->paginate(5);      

        // $data = Pay::select('id_siswa', DB::raw('SUM(jumlah_bayar) as jumlah_bayar'), DB::raw('MAX(tgl_bayar) as tanggal_bayar'))->
        // groupBy('id_siswa')->orderBy('id_siswa', 'asc')->paginate(5);
          
        $sis = Siswa::all();
        return view('home', compact('sis', 'data'));
    }
}
