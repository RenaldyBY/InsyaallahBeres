@extends('template.layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card ">
                <div class="card">
                    <div class="container ">
                        <h1 class="card-title mt-3 pricing-card-title">@stack('tableName')<small class="text-muted"></small>
                        </h1>
                        <div class="card-deck mb-3">
                            <div class="card mb-4 mt-3 shadow-sm">
                                <div class="card-header">
                                    @stack('btnCreate')
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        @yield('tableBody')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
