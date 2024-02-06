@extends('template.layout.form')
@push('formName')
    Keterangan Desa {{ $desa->nama_desa }}
@endpush
@section('formBody')
    <form class="form-sample" method="POST" action="{{ route('admin.desa.update', $desa->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Desa</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->nama_desa }}" name="nama_desa" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->nama_kecamatan }}" name="nama_kecamatan" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Kabupaten</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->nama_kabupaten }}" name="nama_kabupaten" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{$desa->alamat}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Email</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->email }}" name="email" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Kontak</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->kontak }}" name="kontak" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Kepala Desa</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->nama_kepala_desa }}" name="nama_kepala_desa" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">NIP Kepala Desa</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                        value="{{ $desa->nip }}" name="nip" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Tanda tangan kepala desa</label>
                    <br/>
                    @if ($desa->ttd !== null)
                    <img src="{{url('storage/img/ttd/',$desa->ttd)}}" alt="" width="200px" class="img-fluid"><br><br>    
                    @else
                    <p>Belum mengunggah tanda tangan</p>    
                    @endif
                    <input type="file" class="form-control" id="exampleInputUsername1" name="ttd">
                </div>
            </div>
        </div>
        <button type="button" onclick="formConfirmation('Simpan Data?')"
            class="btn btn-primary">Simpan</button>
    </form>
@stop
