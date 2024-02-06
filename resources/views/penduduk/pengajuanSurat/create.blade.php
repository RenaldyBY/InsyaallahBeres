@extends('template.layout.form')
@push('formName')
    Buat Surat {{ $surat->nama_surat }}
@endpush
@section('formBody')
    <form class="form-sample" method="POST" action="{{ route('penduduk.pengajuanSurat.store') }}">
        @csrf
        <input type="hidden" name="surat_id" readonly value="{{ $surat->id }}">
        <input type="hidden" name="penduduk_id" readonly value="{{ $penduduk->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama lengkap</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->nama }}" name="nama" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">NIK</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->nik }}" name="tempat_lahir" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->tempat_lahir }}" name="tempat_lahir" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->tanggal_lahir }}" name="tanggal_lahir" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Pendidikan</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->pendidikan }}" name="pendidikan" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->alamat }}" name="alamat" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">RT</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->rt }}" name="rt" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputUsername1">RW</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" disabled
                        value="{{ $penduduk->rw }}" name="rw" placeholder="Username">
                </div>
            </div>
            @foreach ($detailSurats as $no => $detailSurat)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="{{ $detailSurat->nama_kolom }}">{{ $detailSurat->nama_kolom }}</label>
                        <input type="hidden" value="{{ $detailSurat->nama_kolom }}" class="form-control" required
                            id="{{ $detailSurat->nama_kolom }}" name="nama_kolom[]"
                            placeholder="{{ $detailSurat->nama_kolom }}">
                        <input type="text" class="form-control" required id="{{ $detailSurat->nama_kolom }}"
                            name="isi_kolom[]" placeholder="{{ $detailSurat->nama_kolom }}">
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($detailSurats) > 0)
        <button type="button" onclick="formConfirmation('Buat surat {{ $surat->nama_surat }}')"
            class="btn btn-primary">Buat Surat</button>
        @endif
    </form>
@stop
