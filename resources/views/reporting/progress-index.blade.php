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
                <div class="iq-timeline2 m-0 d-flex align-items-center justify-content-between position-relative">
                    <ul class="list-inline p-0 m-0">
                        <li>
                            <div class="content-date bg-primary"> <span class="date">16</span>
                                <span class="month">JAN</span>
                            </div>
                            <div class="content ml-3 rtl-mr-3 rtl-ml-0">
                                <h6 class="d-inline-block mb-2">Client Login</h6>
                                <small class="float-right mt-1 text-primary">20 Min Ago</small>
                                <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations of passages.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="content-date bg-primary"> <span class="date">25</span>
                                <span class="month">FEB</span>
                            </div>
                            <div class="content ml-3 rtl-mr-3 rtl-ml-0">
                                <h6 class="d-inline-block mb-2">Scheduled Maintenance</h6>
                                <small class="float-right mt-1 text-primary">15 Min Ago</small>
                                <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations of passages.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="content-date bg-primary"> <span class="date">15</span>
                                <span class="month">MAR</span>
                            </div>
                            <div class="content ml-3 rtl-mr-3 rtl-ml-0">
                                <h6 class="d-inline-block mb-2">Client Call</h6>
                                <small class="float-right mt-1 text-primary">10 Min Ago</small>
                                <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations of passages.</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-0">
                            <div class="content-date bg-primary"> <span class="date">20</span>
                                <span class="month">APR</span>
                            </div>
                            <div class="content ml-3 rtl-mr-3 rtl-ml-0">
                                <h6 class="d-inline-block mb-2">Mega event</h6>
                                <small class="float-right mt-1 text-primary">05 Min Ago</small>
                                <div class="d-inline-block w-100">
                                    <p class="mb-0">Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations of passages of Lorem Ipsum available.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection