<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\Desa;

class SuratController extends Controller
{
    public function show($surat)
    {
        $data['pengajuanSurat'] = PengajuanSurat::where('no_surat', $surat)->first();
        $data['desa'] = Desa::first();

        return view('guest.surat.show')->with($data);
    }
}
