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
                <form action="{{ route('reportings.progress.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <textarea class="form-control" id="note" name="note" rows="2" placeholder="Catatan Progress"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 text-right text-md-left">
                            <button type="submit" class="btn btn-success mt-1">Tambahkan</button>
                        </div>
                    </div>
                </form>
                @endcan

                <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                    <ul class="list-inline p-0 m-0">
                        <li>
                            <div class="timeline-dots1 border-primary text-primary"><i class="ri-login-circle-line"></i>
                            </div>
                            <h6 class="float-left mb-1">Client Login</h6>
                            <small class="float-right mt-1">24 November 2019</small>
                            <div class="d-inline-block w-100">
                                <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-dots1 border-success text-success"><i class="ri-shape-line"></i>
                            </div>
                            <h6 class="float-left mb-1">Scheduled Maintenance</h6>
                            <small class="float-right mt-1">23 November 2019</small>
                            <div class="d-inline-block w-100">
                                <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-dots1 border-danger text-danger"><i class="ri-clockwise-2-fill"></i>
                            </div>
                            <h6 class="float-left mb-1">Dev Meetup</h6>
                            <small class="float-right mt-1">20 November 2019</small>
                            <div class="d-inline-block w-100">
                                <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-dots1 border-primary text-primary"><i class="ri-phone-fill"></i>
                            </div>
                            <h6 class="float-left mb-1">Client Call</h6>
                            <small class="float-right mt-1">19 November 2019</small>
                            <div class="d-inline-block w-100">
                                <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-dots1 border-warning text-warning"><i class="ri-book-open-fill"></i>
                            </div>
                            <h6 class="float-left mb-1">Mega event</h6>
                            <small class="float-right mt-1">15 November 2019</small>
                            <div class="d-inline-block w-100">
                                <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection