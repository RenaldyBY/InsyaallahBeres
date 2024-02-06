@extends('template.layout.table')
@push('tableName')
    Detail Surat {{ $surat->nama_surat }}
@endpush
@push('btnCreate')
    <button class="btn btn-primary d-flex justify-content-end" data-toggle="modal" data-target="#tambahSurat"
        onclick="reset()">Tambah Kolom Surat</button>
@endpush
@section('tableBody')
    <table class="table-hover table-bordered" id="dataTable">
        <thead>
            <th>No</th>
            <th>Nama Kolom</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($detailSurats as $no => $detailSurat)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $detailSurat->nama_kolom }}</td>
                    <td>
                        <form action="{{ route('admin.surat.kolom.destroy', $detailSurat->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="formConfirmation('Hapus kolom {{ $detailSurat->nama_kolom }}')"
                                class="btn btn-danger">Hapus</button>
                        </form>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kolom Surat {{ $surat->nama_surat }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-sample" method="POST" action="{{ route('admin.surat.kolom.store') }}">
                        @csrf
                        <input type="hidden" name="surat_id" value="{{ $surat->id }}">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Kolom</label>
                            <input type="text" class="form-control" required id="exampleInputUsername1"
                                name="nama_kolom[]" placeholder="Nama Kolom">
                        </div>
                        <div id="kolom"></div>
                        <button class="btn btn-info" onclick="tambahKolom()" type="button">Tambah Kolom</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button"
                        onclick="formConfirmation('Tambah kolom baru untuk surat {{ $surat->nama_surat }}?')"
                        class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
        function reset() {
            $("#kolom").empty();
        }

        function tambahKolom() {
            $("#kolom").append(`
            <div class="form-group">
                            <label for="exampleInputUsername1">Nama Kolom</label>
                            <input type="text" class="form-control" required id="exampleInputUsername1" name="nama_kolom[]"
                                placeholder="Nama Kolom">
                        </div>
            `);
        }
    </script>
@endpush
