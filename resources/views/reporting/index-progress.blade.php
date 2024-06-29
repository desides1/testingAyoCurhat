@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title w-100">
                    <h4 class="card-title d-inline-block mb-0">Progress Pengaduan</h4>
                </div>
            </div>

            <div class="card-body">
                @can('create_reporting_progress')
                <form action="{{ route('reportings.progress.create') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <textarea class="form-control" id="note" name="note" rows="1" placeholder="Catatan Progress"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 text-right text-md-left">
                            <button type="submit" class="btn btn-primary mt-1">Tambahkan</button>
                        </div>
                    </div>
                </form>
                @endcan

                @forelse ($reportingProgress as $index => $progress)
                <div class="timeline-page mb-4">
                    <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                        <ul class="list-inline p-0 m-0">
                            <li>
                                <div class="timeline-dots1 border-primary text-primary">{{ $index + 1 }}</div>
                                <h6 class="mb-1">{{ $progress->created_at->format('d F Y') }}</h6>
                                <small class="d-block">{{ $progress->created_at->format('H:i:s') }}</small>
                                <div class="d-inline-block w-100">
                                    <p>{{ $progress->note }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @empty
                <div class="text-center mt-4">
                    <img src="{{ asset('assets/images/pages/index-progress.png') }}" class="img-fluid rounded mb-4" alt="Responsive image" style="width: 400px; height: auto">
                    <p>Progress belum ditambahkan</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection