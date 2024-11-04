@extends('layouts.app')

@section('title', $title)

@section('style')

@hasanyrole('Admin|Petugas')

<head>
  <link rel="stylesheet" href="{{ asset('assets/chart/css/flowbite.min.css') }}" />
</head>
@endrole
@endsection

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

  <div class="col-sm-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="header-title">
          <h4 class="card-title">Grafik Statistik</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="w-full rounded-lg p-4 md:p-6" style="width: 100%; height: 400px;">
          <div id="line-chart" style="width: 100%; height: auto;"></div>
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

@section('script')

<script src="{{ asset('assets/chart/js/apexchart.js') }}"></script>
<scr src="{{ asset('assets/chart/js/flowbite.min.js') }}">
  </script>

  <script>
    const options = {
      chart: {
        height: "100%",
        maxWidth: "100%",
        type: "line",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
      },
      tooltip: {
        enabled: true,
        x: {
          show: false,
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: 6,
      },
      grid: {
        show: true,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: -26
        },
      },
      series: [{
          name: "Pengaduan",
          data: [0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0],
          color: "#3BAEDA",
        },
        {
          name: "Konseling",
          data: [0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0],
          color: "#1F9C51",
        },
      ],
      legend: {
        show: false
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        categories: ['Jan 2024', 'Feb 2024', 'Mar 2024', 'Apr 2024', 'Mei 2024', 'Jun 2024', 'Jul 2024', 'Ags 2024', 'Sep 2024', 'Okt 2024', 'Nov 2024', 'Des 2024'],
        labels: {
          show: true,
          style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
          }
        },
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        show: false,
      },
    }

    if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("line-chart"), options);
      chart.render();
    }
  </script>
  @endsection