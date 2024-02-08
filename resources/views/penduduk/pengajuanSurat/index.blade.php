@extends('template.layout.table')
@push('tableName')
    Pengajuan Surat
@endpush
@push('btnCreate')
    <a href="{{ route('penduduk.pengajuanSurat.surat') }}" class="btn btn-sm btn-primary">Buat Surat</a>
@endpush
@section('tableBody')
    <table class="table-hover" id="dataTable">
        <thead>
            <th>No</th>
            <th>Jenis Surat</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($pengajuanSurats as $no => $pengajuanSurat)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pengajuanSurat->surat->nama_surat }}</td>
                    <td>{{ $pengajuanSurat->tanggal_pengajuan }}</td>
                    @if ($pengajuanSurat->status == 1)
                        <td><span class="badge badge-success">Terverivikasi</span></td>
                    @elseif($pengajuanSurat->status == 0)
                        <td><span class="badge badge-warning">Belum Terverivikasi</span></td>
                    @else
                    <td><span class="badge badge-danger">Ditolak</span></td>
                    @endif
                    <td>
                        <a href="{{route('penduduk.pengajuanSurat.show', $pengajuanSurat->no_surat)}}" target="_blank" class="btn btn-info" rel="noopener noreferrer">Lihat</a>
                        @if ($pengajuanSurat->status == 1)
                        <a href="{{route('penduduk.pengajuanSurat.cetak', $pengajuanSurat->no_surat)}}" target="_blank" class="btn btn-primary" rel="noopener noreferrer">PDF</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
