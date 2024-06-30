@extends('layouts.app')

@section('title', $title)

@section('content')

@hasanyrole('Admin|Petugas')
<div class="row mx-1 my-1">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="header-title w-100">
          <h4 class="card-title d-inline-block mb-0">Dashboard</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-4">
          Ini dashboard
        </div>
      </div>
    </div>
  </div>
</div>
@endrole

@role('Tamu Satgas')
<div class="row mx-1 my-1">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="header-title w-100">
          <h4 class="card-title d-inline-block mb-0">Dashboard</h4>
        </div>
      </div>
      <div class="card-body text-center" style="padding: 35px;">
        <h3 class="mb-3">SELAMAT DATANG DI SISTEM LAYANAN AYO CURHAT</h3>
        <p>"Kepuasan anda sangat berarti bagi kami" - Satgas PPKS Poliwangi</p>
        <img src="{{ asset('assets/images/pages/logo-satgas.png') }}" class="img-fluid rounded my-4" alt="Responsive image" style="width: 600px; height: auto; margin-bottom: 20px;">
      </div>
    </div>
  </div>
</div>
@endrole

@endsection