<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelahiran;
use Alert;
class KelahiranController extends Controller
{
    public function index()
    {
        $data =kelahiran::with(['user', 'status'])->get();
        $title = 'Hapus Surat ini?';
        $text = "Apakah Kamu yakin";
        confirmDelete($title, $text);
        return view('warga.jenis_surat.kelahiran.index', compact('data'));

    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_lengkap' => 'required|string',
        //     'tempat_lahir' => 'required|string',
        //     'tanggal_lahir' => 'required|date',
        //     'pendidikan' => 'required|string',
        //     'alamat' => 'required|string',
        //     'rt' => 'required|string',
        //     'rw' => 'required|string',
        //     'bidang_usaha' => 'required|string',
        //     'lama_usaha' => 'required|string',
        //     'alamat_usaha' => 'required|string',
        //     'tujuan' => 'required|string',
        // ]);

        $lastNumber = kelahiran::max('nomor_urut');
        $lastNumber = $lastNumber ? $lastNumber : 0;
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $nomorBerkas = $newNumber.'/'.now()->format('m').'/SR.SKU/'.now()->format('Y');
        kelahiran::create([
            'nama_anak' => $request->input('nama_anak'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'anak_ke' => $request->input('anak_ke'),
            'nik_ibu' => $request->input('nik_ibu'),
            'nik_ayah' => $request->input('nik_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'nama_ayah' => $request->input('nama_ayah'),
            'pekerjaan_ayah' => $request->input('pekerjaan_ayah'),
            'nama_pelapor' => $request->input('nama_pelapor'),
            'nik_pelapor' => $request->input('nik_pelapor'),
            'hubungan' => $request->input('hubungan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'id_user' => auth()->user()->id,
            'id_status' => 1,
            'nomor_surat' =>  $nomorBerkas,
            'nomor_urut' =>$newNumber
        ]);
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect('/warga/Pengajuan_surat_kelahiran');
    }
    public function print($id){
        $data = kelahiran::with(['user', 'status','user.desa'])->find($id);
        if (!$data) {
            abort(404);
        }

        return view('warga.jenis_surat.kelahiran.print_surat', compact('data'));
    }
    public function destroy($id){


        $data = kelahiran::find($id);
        if (!$data) {
            abort(404);
        }
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect('/warga/Pengajuan_surat_kelahiran');
    }
}
