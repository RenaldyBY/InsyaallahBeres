<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboardwarga(){
        return view('warga.dasboard_penduduk.index');
    }
    public function dashboardopareator(){
        return view('kaur_tataUsaha.dashboard');
    }
    public function dashboardKades(){
        return view('operator.dasboard_penduduk.index');
    }
    public function pengajuan_surat(){
        return view('warga.jenis_surat.index');
    }

}
