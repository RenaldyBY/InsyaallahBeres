@extends('template.layout.form')
@push('formName')
    Edit Surat {{ $surat->nama_surat }}
@endpush
@section('formBody')
<form class="form-sample" method="POST" action="{{route('admin.surat.update', $surat->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleInputUsername1">Nama Surat</label>
        <input type="text" class="form-control" value="{{$surat->nama_surat}}" id="exampleInputUsername1" name="nama_surat"
            placeholder="Nama Surat">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Format Penomoran Surat</label>
        <input type="text" class="form-control" value="{{$surat->format_no_surat}}" id="exampleInputUsername1" name="format_no_surat"
            placeholder="Format Penomoran Surat">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Masa Berlaku Dalam Hari</label>
        <input type="number" class="form-control" value="{{$surat->masa_berlaku}}" id="exampleInputUsername1" name="masa_berlaku"
            placeholder="Masa Berlaku. Angkanya saja">
    </div>
    <button type="button" onclick="formConfirmation('Simpan perubahan surat {{$surat->nama_surat}}')" class="btn btn-primary mr-2">Simpan</button>
@stop
