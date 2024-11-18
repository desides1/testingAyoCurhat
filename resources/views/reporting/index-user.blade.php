@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row mx-1 my-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title w-100">
                    <h4 class="card-title d-inline-block mb-0">Data Pengaduan</h4>
                </div>
            </div>

            <div class="card-body">
                @can('create_reportings')
                <span class="table-add float-right mb-3 mr-2 rtl-ml-2 rtl-mr-0">
                    <a href="{{ route('reportings.create') }}" class="btn btn-primary toolbox-button">
                        <i class="ri-add-circle-line"></i>
                        Tambah Pengaduan
                    </a>
                </span>
                @endcan

                <table id="datatable" class="table data-table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu (WIB)</th>
                            <th>Jenis Kasus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportings as $reporting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reporting->created_at->format('d-m-Y') }}</td>
                            <td>{{ $reporting->created_at->format('H:i:s') }}</td>
                            <td>{{ $reporting->caseType->name }}</td>
                            <td>
                                <a href="{{ route('reportings.show', $reporting->id) }}" class="btn btn-warning btn-sm mr-2" target="_blank">
                                    <i class="ri-eye-line"></i> Detail
                                </a>

                                <a href="{{ route('reportings.progress', $reporting->id) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="ri-line-chart-line"></i> Progress
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection