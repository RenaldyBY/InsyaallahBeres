<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Penduduk;
use App\Models\DetailSurat;
use App\Models\PengajuanSurat;
use App\Models\PengajuanSuratDetail;
use App\Models\Desa;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $data['pengajuanSurats'] = PengajuanSurat::where('penduduk_id', Auth::user()->penduduk_id)->get();
        return view('penduduk.pengajuanSurat.index')->with($data);
    }

    public function surat()
    {
        $data['surats'] = Surat::orderBy('nama_surat', 'asc')->get();
        return view('penduduk.pengajuanSurat.pilihSurat')->with($data);
    }

    public function create($surat)
    {   
        $data['surat'] = Surat::where('id', $surat)->first();
        $data['penduduk'] = Penduduk::where('id', Auth::user()->penduduk_id)->first();
        $data['detailSurats'] = DetailSurat::where('surat_id',  $surat)->get();
        // dd($data['detailSurats']);
        return view('penduduk.pengajuanSurat.create')->with($data);
    }

    public function store(Request $req)
    {
        $input = $req->input();
        $surat_id = $req->surat_id;
        $penduduk_id = $req->penduduk_id;

        $pengajuanSurat = new PengajuanSurat;
        $pengajuanSuratDetail = new PengajuanSuratDetail;
        $surat = Surat::where('id', $surat_id)->first();

        $no_surat = $surat->format_no_surat . '-' . date('d') . '-' . date('m') . '-' . date('Y') . '-' . rand(000000,  999999);
        // dd($input);
        $ps = [
            'surat_id' => $surat_id,
            'penduduk_id' => $penduduk_id,
            'no_surat' => $no_surat,
            'tanggal_pengajuan' => now(),
        ];
        try {
            $pengajuanSurat->create($ps);
            foreach($input['nama_kolom'] as $no => $value){
                $pengajuanSuratDetail->create([
                    'no_surat' => $no_surat,
                    'nama_kolom' => $input['nama_kolom'][$no],
                    'isi_kolom' => $input['isi_kolom'][$no]
                ]);
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->route('penduduk.pengajuanSurat.index')->with('success', 'Pengajuan Surat Berhasil');
    }

    public function show($surat)
    {
        $data['pengajuanSurat'] = PengajuanSurat::where('no_surat', $surat)->first();
        $data['desa'] = Desa::first();

        return view('penduduk.pengajuanSurat.show')->with($data);
    }
}
