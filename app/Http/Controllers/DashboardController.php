<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $user = new User();
        $role = $user->namaRole();
        return view($role . '.dashboard.index');
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
