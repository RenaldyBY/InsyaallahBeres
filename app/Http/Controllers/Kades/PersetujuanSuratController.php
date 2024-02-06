<?php

namespace App\Http\Controllers\Kades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\PengajuanSurat;

class PersetujuanSuratController extends Controller
{
    public function index()
    {
        $data['pengajuanSurats'] = PengajuanSurat::orderBy('tanggal_pengajuan', 'asc')->get();
        return view('kades.persetujuanSurat.index')->with($data);
    }

    public function setujui(Request $request)
    {
        // dd($surat);
        $surat = $request->no_surat;
        try {
            $pengajuanSurat = PengajuanSurat::where('no_surat', $surat)->first();
            $surat = Surat::where('id', $pengajuanSurat->surat_id)->first();
            $tanggalPengajuan = strtotime($pengajuanSurat->tanggal_pengajuan);
            $masaBerlaku = $tanggalPengajuan + ($surat->masa_berlaku * 24 * 60 * 60);
            $tanggalExpired = date("Y-m-d", $masaBerlaku);
            $pengajuanSurat->update([
                    'status' => 1,
                    'tanggal_expired' => $tanggalExpired,
                    'ttd' => true,
                ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->back()->with('success', 'Berhasil menyetujui surat');
    }
}
