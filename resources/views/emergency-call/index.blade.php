@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row mx-3">
    <div class="col text-center">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Panggilan Darurat</h4>
                </div>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/pages/emergency-call.png') }}" class="img-fluid rounded" alt="Responsive image" style="width: 400px; height: auto;">
                <p>Lakukan panggilan darurat ketika anda membutuhkan pelayanan sesegera mungkin. Kami akan melakukan yang terbaik untuk anda.</p>
                <a href="https://wa.me/6282139443575" target="_blank">
                    <button type="button" class="mt-2 btn btn-success">
                        <i class="ri-whatsapp-line"></i>Hubungi Sekarang
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection