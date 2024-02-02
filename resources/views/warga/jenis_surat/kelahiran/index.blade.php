@extends('warga.dasboard_penduduk.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <p class="card-description">
                        Add class <code>.table-bordered</code>
                    </p>
                    <button class="btn btn-primary d-flex justify-content-end" data-toggle="modal"
                        data-target="#exampleModal">tambah data</button>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered display" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Waktu Pembuatan
                                    </th>
                                    <th>
                                        Nama Pengaju
                                    </th>
                                    <th>
                                        Nomor
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $kelahiran)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        {{ $kelahiran->created_at}}
                                    </td>
                                    <td>
                                        {{ $kelahiran->user->name}}
                                    </td>
                                    <td>
                                        {{ $kelahiran->nomor_surat}}
                                    </td>
                                    <td>
                                        @if( $kelahiran->id_status  == '1')
                                        <label class="badge badge-warning">{{ $kelahiran->status->nama_status}}</label>
                                        @elseif($kelahiran->id_status  == '2')
                                        <label class="badge badge-danger">{{ $kelahiran->status->nama_status}}</label>
                                        @else
                                        <label class="badge badge-primary">{{ $kelahiran->status->nama_status}}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="/warga/Pengajuan_surat_kelahiran/print/{{$kelahiran->id}}">Print
                                            <i class="ti-printer btn-icon-append"></i></a>
                                            <a class="btn btn-danger" href="/warga/Pengajuan_surat_keahiran/hapus/{{$kelahiran->id}} "   data-confirm-delete="true">  Delete
                                                <i class="ti-trash btn-icon-append"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Anak</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="nama_anak"
                                    placeholder="Nama Anak">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tempat Lahir</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="tempat_lahir"
                                    placeholder="Tempat Lahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="exampleInputUsername1"  name="tanggal_lahir"
                                    placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jenis_kelamin">
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Anak Ke</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Anak Ke" name="anak_ke">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama ibu</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="nama_ibu"
                                    placeholder="Nama ibu">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">NIK ibu</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="nik"
                                    placeholder="NIK ibu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama ayah</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="nama_ayah"
                                    placeholder="Nama ayah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">NIK ayah</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="nik"
                                    placeholder="NIK ayah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Pekerjaan ayah</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="pekerjaan_ayah"
                                    placeholder="Pekerjaan ayah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Pelapor</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="nama_pelapor"
                                    placeholder="Nama Pelapor">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nik Pelapor</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="nik"
                                    placeholder="Nik Pelapor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Hubungan Anak Dengan Pelapor</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                name="hubungan"
                                    placeholder="Hubungan Anak Dengan Pelapor">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('Script')
    <script>

    </script>
@endsection

