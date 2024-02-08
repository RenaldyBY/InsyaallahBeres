@extends('template.layout.table')
@push('tableName')
    Pengajuan Surat
@endpush
@section('tableBody')
    <table class="table-hover" id="dataTable">
        <thead>
            <th>No</th>
            <th>Jenis Surat</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Penduduk</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($pengajuanSurats as $no => $pengajuanSurat)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pengajuanSurat->surat->nama_surat }}</td>
                    <td>{{ $pengajuanSurat->tanggal_pengajuan }}</td>
                    <td>{{ $pengajuanSurat->penduduk->nama }}</td>
                    @if ($pengajuanSurat->status == 1)
                        <td><span class="badge badge-success">Terverivikasi</span></td>
                    @elseif($pengajuanSurat->status == 0)
                        <td><span class="badge badge-warning">Belum Terverivikasi</span></td>
                    @else
                    <td><span class="badge badge-danger">Ditolak</span></td>
                    @endif
                    <td>
                        <a href="{{route('surat.show', $pengajuanSurat->no_surat)}}" target="_blank" class="btn btn-info" rel="noopener noreferrer">Lihat</a>
                        @if ($pengajuanSurat->status == 0)
                        <form action="{{route('kades.persetujuanSurat.setujui')}}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="no_surat" value="{{$pengajuanSurat->no_surat}}">
                            <button type="button" class="btn btn-success" onclick="formConfirmation('Setujui surat {{$pengajuanSurat->surat->nama_surat}} ini?')">Setujui</button>
                        </form>
                        <form action="{{route('kades.persetujuanSurat.tolak')}}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="no_surat" value="{{$pengajuanSurat->no_surat}}">
                            <button type="button" class="btn btn-danger" onclick="formConfirmation('Tolak surat {{$pengajuanSurat->surat->nama_surat}} ini?')">Tolak</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
