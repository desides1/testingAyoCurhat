@extends('layouts.app')

@section('title', $title)

@section('content')
@hasanyrole('Admin|Petugas')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      Ini dashboard nya admin
      @can('create-users')
      <button class="btn btn-primary">Create User</button>
      @endcan
    </div>
  </div>
</div>
@endhasanyrole

@role('Petugas')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      Ini Dashboard nya petugas
    </div>
  </div>
</div>
@endrole
@endsection