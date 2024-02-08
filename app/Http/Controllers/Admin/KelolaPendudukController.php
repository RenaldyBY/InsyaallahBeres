<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Desa;

class KelolaPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['penduduks'] = Penduduk::orderBy('nama', 'asc')->get();
        return view('admin.penduduk.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['desa'] = Desa::first();
        return view('admin.penduduk.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:penduduks,nik|digits:16',
            'agama' => 'required',
            'kk' => 'required|digits:16',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        $penduduk = new Penduduk;

        try {
            $penduduk->create($request->all());
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with($th->getMessage());
        }
        return redirect()->route('admin.penduduk.index')->with('success', 'Penduduk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data['penduduk'] = Penduduk::where('id', $id)->first();
        // dd($data['penduduk']);
        return view('admin.penduduk.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|digits:16',
            'agama' => 'required',
            'kk' => 'required|digits:16',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        try {
            $penduduk->update($request->all());
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with($th->getMessage());
        }
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Penduduk::where('id', $id)->delete();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with($th->getMessage());
        }
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil dihapus');
    }
}
