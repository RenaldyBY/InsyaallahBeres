<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use Storage;

class PengaturanDesaController extends Controller
{
    public function index()
    {
        $data['desa'] = Desa::first();
        return view('admin.desa.index')->with($data);
    }

    public function update(Request $request, Desa $desa)
    {

        $validate = $request->validate([
            'ttd' => 'image|mimes:jpeg,png,jpg,svg'
        ]);

        try {
            $foto = $request->ttd;
    
            if ($request->hasFile('ttd')) {
                if($desa->ttd !== null){
                    Storage::delete('public/img/ttd/'.$desa->ttd);
                }
                $extension = $foto->extension();
                $filename = 'ttd_' . $request->nama_kepala_desa .'_' . time() . '.' . $extension;
                $foto->storeAs('public/img/ttd/', $filename);
                $fotoDb = $filename;
                
            } else {
                $fotoDb = $desa->ttd;
            }
            $data = $request->all();
            $data['ttd'] = $fotoDb;
            $desa->update($data);

        } catch (\Throwable $th) {
            
            return redirect()
            ->back()
            ->withErrors($th->getMessage())
            ->withInput();
        }
        return redirect()
        ->back()
        ->with('success', 'Berhasil memperbarui data desa');
    }
}
