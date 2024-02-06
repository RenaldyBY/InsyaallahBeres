@extends('template.layout.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="container ">
                    <div class="card-deck mb-3 text-center">
                        <div class="row mt-4 mb-4">
                            @foreach ($surats as $surat)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                        <h4 class="my-0 font-weight-normal">Pengajuan Surat</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">{{$surat->nama_surat}}<small class="text-muted"></small>
                                        </h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>20 users included</li>
                                            <li>10 GB of storage</li>
                                            <li>Priority email support</li>
                                            <li>Help center access</li>
                                        </ul>
                                        <a href="{{route('penduduk.pengajuanSurat.create', $surat->id)}}" class="btn btn-lg btn-block btn-primary">Buat Surat</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
