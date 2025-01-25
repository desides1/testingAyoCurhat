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
                <select class="form-control mb-4" id="select-reporting-status-filter" name="filter">
                    <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Pengaduan</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Dipublikasikan</option>
                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Diarsipkan</option>
                </select>

                <table id="datatable" class="table data-table table-striped table-bordered" style="font-size: 0.875rem;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu (WIB)</th>
                            <th>Nama Pelapor</th>
                            <th>Jenis Kasus</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportings as $reporting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reporting->created_at->format('d-m-Y') }}</td>
                            <td>{{ $reporting->created_at->format('H:i:s') }}</td>
                            <td>{{ $reporting->reportingUser->name }}</td>
                            <td>{{ $reporting->caseType->name }}</td>
                            <td>
                                @if ($reporting->reporting_status == 'published')
                                <span class="btn btn-success btn-sm">{{ ucfirst($reporting->reporting_status) }}</span>
                                @elseif ($reporting->reporting_status == 'archived')
                                <span class="btn btn-danger btn-sm">{{ ucfirst($reporting->reporting_status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('reportings.show', $reporting->id) }}" class="btn btn-warning btn-sm mr-2 my-2" target="_blank">
                                    <i class="ri-eye-line"></i> Detail
                                </a>

                                <a href="{{ route('reportings.progress', $reporting->id) }}" class="btn btn-info btn-sm mr-2 my-2">
                                    <i class="ri-line-chart-line"></i> Progress
                                </a>

                                <!-- Update Status Pengaduan -->
                                @if ($reporting->reporting_status == 'published')
                                <form action="{{ route('reportings.status.update', $reporting->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="archive">
                                    <button id="archive" type="submit" class="btn btn-danger btn-sm mr-2 my-2">
                                        <i class="ri-inbox-archive-line"></i> Arsipkan
                                    </button>
                                </form>
                                @elseif ($reporting->reporting_status == 'archived')
                                <form action="{{ route('reportings.status.update', $reporting->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="publish">
                                    <button id="publish" type="submit" class="btn btn-success btn-sm mr-2 my-2">
                                        <i class="ri-inbox-unarchive-line"></i> Publikasikan
                                    </button>
                                </form>
                                @endif
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

@section('script')
<script>
    $(function() {
        $('#select-reporting-status-filter').change(e => {
            window.location.href = `{{ route("reportings.index") }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
        });
    });
</script>
@endsection