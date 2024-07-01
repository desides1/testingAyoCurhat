@extends('layouts.app')

@section('title', $title)

@section('content')

@hasanyrole('Admin|Petugas')
<div class="row mx-1 my-1">
  <div class="col-sm-6">
    <div class="card card-block card-stretch card-height">
      <div class="card-body">
        <div class="top-block d-flex align-items-center justify-content-between mb-3">
          <h3 class="text-primary">
            <span class="counter">{{ $reportingCount }}</span> Pengaduan
          </h3>
          <div class="bg-primary icon iq-icon-box-2 mr-2 rounded">
            <i class="ri-edit-box-line"></i>
          </div>
        </div>
        <h4>Total Seluruh Pengaduan</h4>
        <div class="mt-1">
          <p class="mb-0">{{ date('d F Y', time()) }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card card-block card-stretch card-height">
      <div class="card-body">
        <div class="top-block d-flex align-items-center justify-content-between mb-3">
          <h3 class="text-success">
            <span class="counter">{{ $userMessagesCount }}</span> Konseling
          </h3>
          <div class="bg-success icon iq-icon-box-2 mr-2 rounded">
            <i class="ri-message-line"></i>
          </div>
        </div>
        <h4>Total Konseling</h4>
        <div class="mt-1">
          <p class="mb-0">{{ date('d F Y', time()) }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div class="header-title">
        <h4 class="card-title">Line Chart</h4>
      </div>
    </div>
    <div class="card-body">
      Dashboard
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