@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row mx-1 my-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title w-100">
                    <h4 class="card-title d-inline-block mb-0">Panggilan Darurat</h4>
                </div>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('assets/images/pages/emergency-call.png') }}" class="img-fluid rounded" alt="Responsive image" style="width: 400px; height: auto;">
                <p>Lakukan panggilan darurat ketika anda membutuhkan pelayanan sesegera mungkin. Kami akan melakukan yang terbaik untuk anda.</p>
                <a href="https://wa.me/6282139443575" target="_blank">
                    <button type="button" class="mt-2 btn btn-primary">
                        <i class="ri-whatsapp-line"></i>Hubungi Sekarang
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection