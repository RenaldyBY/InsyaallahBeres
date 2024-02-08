@extends('template.layout.table')
@push('tableName')
    Penduduk
@endpush
@push('btnCreate')
<a href="{{route('admin.penduduk.create')}}" class="btn btn-primary d-flex justify-content-end">Tambah Penduduk</a>
@endpush
@section('tableBody')
    <table class="table-hover table-bordered" id="dataTableWithExport">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>KK</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($penduduks as $no => $penduduk)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $penduduk->nama }}</td>
                    <td>{{ $penduduk->nik }}</td>
                    <td>{{$penduduk->kk}}</td>
                    <td>
                        <form action="{{route('admin.penduduk.destroy', $penduduk->id)}}" method="post">
                            @method('delete')
                            @csrf
                        <a href="{{route('admin.penduduk.show', $penduduk->id)}}" class="btn btn-info">Lihat</a>
                        <a href="{{route('admin.penduduk.edit', $penduduk->id)}}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" onclick="formConfirmation('Hapus penduduk {{$penduduk->nama}} ?')">Hapus</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
