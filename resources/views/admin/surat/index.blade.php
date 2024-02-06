@extends('template.layout.table')
@push('tableName')
    Surat
@endpush
@push('btnCreate')
<button class="btn btn-primary d-flex justify-content-end" data-toggle="modal"
data-target="#tambahSurat">Tambah Surat</button>
@endpush
@section('tableBody')
    <table class="table-hover table-bordered" id="dataTable">
        <thead>
            <th>No</th>
            <th>Nama Surat</th>
            <th>Format Penomoran Surat</th>
            <th>Masa Berlaku</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($surats as $no => $surat)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $surat->nama_surat }}</td>
                    <td>{{ $surat->format_no_surat }}</td>
                    <td>{{$surat->masa_berlaku}} Hari</td>
                    <td>
                        <a href="{{route('admin.surat.show', $surat->id)}}" class="btn btn-info">Detail</a>
                        <a href="{{route('admin.surat.edit', $surat->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="tambahSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe Surat Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-sample" method="POST" action="{{route('admin.surat.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Surat</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="nama_surat"
                                placeholder="Nama Surat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Format Penomoran Surat</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="format_no_surat"
                                placeholder="Format Penomoran Surat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Masa Berlaku Dalam Hari</label>
                            <input type="number" class="form-control" id="exampleInputUsername1" name="masa_berlaku"
                                placeholder="Masa Berlaku. Angkanya saja">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="formConfirmation('Tambah surat baru?')" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop
