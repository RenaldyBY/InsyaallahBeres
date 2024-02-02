@extends('warga.dasboard_penduduk.template')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Surat domisili</h4>
                    <p class="card-description">
                        {{-- Add class <code>.table-bordered</code> --}}
                    </p>
                    <button class="btn btn-primary d-flex justify-content-end" data-toggle="modal"
                        data-target="#storedata">tambah data</button>
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
                                @foreach($data as $key => $domisili)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $domisili->created_at }}</td>
                                    <td>{{ $domisili->user->name}}</td>
                                    <td>{{ $domisili->nomor_surat }}</td>
                                    <td>
                                        @if( $domisili->id_status  == '1')
                                        <label class="badge badge-warning">{{ $domisili->status->nama_status}}</label>
                                        @elseif($domisili->id_status  == '2')
                                        <label class="badge badge-danger">{{ $domisili->status->nama_status}}</label>
                                        @else
                                        <label class="badge badge-primary">{{ $domisili->status->nama_status}}</label>
                                        @endif
                                    </td>
                                    <td>
                                       <a class="btn btn-primary" href="/warga/Pengajuan_surat_domisili/print/{{$domisili->id}}">Print
                                        <i class="ti-printer btn-icon-append"></i></a>
                                        <a class="btn btn-danger" href="/warga/Pengajuan_surat_domisili/hapus/{{$domisili->id}} "   data-confirm-delete="true">  Delete
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



{{-- pisahkan mun dah jalan --}}
{{-- Tambah --}}
<div class="modal fade" id="storedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat title di index</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample" action="{{route('domisili.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama lengkap</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="nama_lengkap"
                                    placeholder="Nama Lengkap">
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
                                <input type="date" class="form-control" id="exampleInputUsername1" name="tanggal_lahir"
                                    placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Pendidikan</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="pendidikan"
                                    placeholder="Pendidikan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alamat</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="alamat"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">RT</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="rt"
                                    placeholder="RT">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">RW</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="rw"
                                    placeholder="RW">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tujuan</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="tujuan"
                                    placeholder="Tujuan">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection


@section('Script')
    <script>

    </script>
@endsection
