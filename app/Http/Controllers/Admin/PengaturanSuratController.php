<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\DetailSurat;

class PengaturanSuratController extends Controller
{
    public function index()
    {
        $data['surats'] = Surat::orderBy('nama_surat', 'asc')->get();
        return view('admin.surat.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_surat' => 'required',
            'format_no_surat' => 'required',
            'masa_berlaku' => 'required',
        ]);

        $surat = new Surat();
        try {
            $surat->create($request->all());
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->back()->with('success', 'Surat baru berhasil ditambahkan');
    }

    public function show(Surat $surat)
    {
        $data['surat'] = $surat;
        // dd($surat);
        $data['detailSurats'] = DetailSurat::where('surat_id', $surat->id)->get();
        return view('admin.surat.show')->with($data);
    }

    public function edit(Surat $surat)
    {
        $data['surat'] = $surat;
        return view('admin.surat.edit')->with($data);
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nama_surat' => 'required',
            'format_no_surat' => 'required',
            'masa_berlaku' => 'required',
        ]);

        try {
            $surat->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());   
        }

        return redirect()->route('admin.surat.index')->with('success', 'Surat berhasil diperbarui');
    }

    public function storeKolom(Request $request)
    {
        $request->validate([
            'nama_kolom' => 'required|unique:detail_surats,nama_kolom',
        ]);

        $surat_id = $request->surat_id;
        try {
            foreach($request->nama_kolom as $value){
                if($value != null){
                    $detailSurat = new DetailSurat;
                    $detailSurat->create([
                        'surat_id' => $surat_id,
                        'nama_kolom' => $value
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->back()->with('success', 'Berhasil menambahkan kolom baru');
    }

    public function destroyKolom(String $detailSurat)
    {
        try {
            DetailSurat::where('id', $detailSurat)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->back()->with('success', 'Berhasil menghapus kolom');
    }
}
