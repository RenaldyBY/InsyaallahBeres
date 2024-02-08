@extends('template.layout.form')
@push('formName')
Edit Data Penduduk {{$penduduk->nama}}
@endpush
@section('formBody')
<form class="form-sample" method="POST" action="{{ route('admin.penduduk.update', $penduduk->id) }}">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Lengkap</label>
                <input type="text" class="form-control" value="{{$penduduk->nama}}" id="exampleInputUsername1" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">NIK</label>
                <input type="text" class="form-control" value="{{$penduduk->nik}}" id="exampleInputUsername1" name="nik" placeholder="nik">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">No KK</label>
                <input type="text" class="form-control" value="{{$penduduk->kk}}" id="exampleInputUsername1" name="kk" placeholder="KK">
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                @if ($penduduk->jk == 1)
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jk" checked id="jk" value="1">
                            Laki-laki
                            <i class="input-helper"></i></label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jk" id="jk" value="0">
                            Perempuan
                            <i class="input-helper"></i></label>
                    </div>
                </div>
                @else
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jk"  id="jk" value="1">
                            Laki-laki
                            <i class="input-helper"></i></label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" checked name="jk" id="jk" value="0">
                            Perempuan
                            <i class="input-helper"></i></label>
                    </div>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Tempat lahir</label>
                <input type="text" class="form-control" value="{{$penduduk->tempat_lahir}}" id="tempat_lahir" name="tempat_lahir"
                    placeholder="Tempat lahir">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Tanggal lahir</label>
                <input type="date" class="form-control" value="{{$penduduk->tanggal_lahir}}" id="tanggal_lahir" name="tanggal_lahir"
                    placeholder="Tanggal lahir">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Alamat</label>
                <input type="text" class="form-control" value="{{$penduduk->alamat}}" id="alamat" name="alamat" placeholder="Alamat">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">RT</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$penduduk->rt}}" id="rt" name="rt" placeholder="RT">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">RW</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$penduduk->rw}}" id="rw" name="rw" placeholder="RW">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status_perkawinan">
                        <option value="{{$penduduk->status_perkawinan}}" selected>{{$penduduk->status_perkawinan}}</option>
                        <option value="Lajang" selected>Lajang</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Duda">Duda</option>
                        <option value="Janda">Janda</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-9">
                    <select class="form-control" name="agama">
                        <option value="{{$penduduk->agama}}" selected>{{$penduduk->agama}}</option>
                        <option value="Islam" selected>Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Pekerjaan</label>
                <input type="text" class="form-control" value="{{$penduduk->pekerjaan}}" id="pekerjaan" name="pekerjaan"
                    placeholder="Pekerjaan">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Pendidikan</label>
                <input type="text" class="form-control" value="{{$penduduk->pendidikan}}" id="pendidikan" name="pendidikan"
                    placeholder="Pendidikan">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Kewarganegaraan</label>
                <input type="text" class="form-control" value="{{$penduduk->kewarganegaraan}}" id="kewarganegaraan" name="kewarganegaraan"
                    placeholder="Kewarganegaraan">
            </div>
        </div>
    </div>
    <button type="button" onclick="formConfirmation('Simpan data penduduk?')" class="btn btn-primary">Simpan</button>
</form>
@stop
