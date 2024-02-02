<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsSku;
use Alert;
class SkuController extends Controller
{
    public function index()
    {
        $data =ModelsSku::with(['user', 'status'])->get();
        $title = 'Hapus Surat ini?';
        $text = "Apakah Kamu yakin";
        confirmDelete($title, $text);
        return view('warga.jenis_surat.sku.index', compact('data'));

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

        $lastNumber = ModelsSku::max('nomor_urut');
        $lastNumber = $lastNumber ? $lastNumber : 0;
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $nomorBerkas = $newNumber.'/'.now()->format('m').'/SR.SKU/'.now()->format('Y');
        ModelsSku::create([
            'name_lengkap' => $request->input('nama_lengkap'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'pendidikan' => $request->input('pendidikan'),
            'alamat' => $request->input('alamat'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
            'alamat_usaha' => $request->input('alamat_usaha'),
            'bidang_usaha' => $request->input('bidang_usaha'),
            'lama_usaha' => $request->input('lama_usaha'),
            'tujuan' => $request->input('tujuan'),
            'rw' => $request->input('rw'),
            'tujuan' => $request->input('tujuan'),
            'id_user' => auth()->user()->id,
            'id_status' => 1,
            'nomor_surat' =>  $nomorBerkas,
            'nomor_urut' =>$newNumber
        ]);
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect('/warga/Pengajuan_surat_sku');
    }
    public function print($id){
        $data = ModelsSku::with(['user', 'status','user.desa'])->find($id);
        if (!$data) {
            abort(404);
        }

        return view('warga.jenis_surat.sku.print_surat', compact('data'));
    }
    public function destroy($id){


        $data = ModelsSku::find($id);
        if (!$data) {
            abort(404);
        }
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect('/warga/Pengajuan_surat_sku');
    }


}
