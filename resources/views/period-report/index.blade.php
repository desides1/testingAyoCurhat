@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row mx-1 my-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title w-100">
                    <h4 class="card-title d-inline-block mb-0">Laporan Pengaduan</h4>
                </div>
                <a target="_blank" href="{{ route('report.download', ['year'=>$year, 'month'=>$month]) }}" class="btn btn-primary mr-2 col-2">Unduh PDF</a>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-6">
                        <select class="form-control" id="select-reporting-year-filter" name="year">
                            <option value="">Semua Tahun</option>
                            @foreach ($validYear as $availableYear)
                            <option value="{{ $availableYear }}" {{ request('year') == $availableYear ? 'selected' : '' }}>
                                {{ $availableYear }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <select class="form-control" id="select-reporting-month-filter" name="month">
                            <option value="">Semua Bulan</option>
                            @foreach (range(1, 12) as $monthNumber)
                            <option value="{{ $monthNumber }}" {{ request('month') == $monthNumber ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $monthNumber)->format('F') }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <table id="datatable" class="table data-table table-striped table-bordered" style="font-size: 0.875rem;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kasus</th>
                            <th>Jumlah Pengaduan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($caseTypes as $caseType)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $caseType->name }}</td>
                            <td>{{ $caseType->reportings_count ?? 0 }}</td>
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
        $('#select-reporting-year-filter, #select-reporting-month-filter').change(e => {
            let year = $('#select-reporting-year-filter').val();
            let month = $('#select-reporting-month-filter').val();

            window.location.href = `{{ route("report.index") }}?year=${year}&month=${month}`;
        });
    });
</script>
@endsection