@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row mt-5">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="header-title w-100">
          <h4 class="card-title d-inline-block mb-0">Data Petugas</h4>
        </div>
      </div>

      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-10">
            <select class="form-control d-inline-block" id="select-user-status-filter" name="filter">
              <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Petugas</option>
              <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
              <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
          </div>
          <div class="col-md-2">
            @can('create_users')
            <span class="table-add">
              <a href="{{ route('users.create') }}" class="btn btn-primary btn-block">
                <i class="ri-add-line"></i>
                Tambah Data
              </a>
            </span>
            @endcan
          </div>
        </div>

        <table id="datatable" class="table data-table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>
                @if ($user->user_status == 'active')
                <span class="btn btn-success btn-sm">{{ ucfirst($user->user_status) }}</span>
                @elseif ($user->user_status == 'inactive')
                <span class="btn btn-danger btn-sm">{{ ucfirst($user->user_status) }}</span>
                @endif
              </td>
              <td>
                <!-- <a href="{{ route('reportings.show', $reporting->id) }}" class="btn btn-warning btn-sm mr-2" target="_blank">
                  <i class="ri-eye-line"></i> Detail
                </a> -->

                <!-- Update Status Petugas -->
                @if ($user->user_status == 'active')
                <form action="{{ route('users.status.update', $reporting->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="inactive">
                  <button type="submit" class="btn btn-danger btn-sm mr-2">
                    <i class="ri-checkbox-indeterminate-line"></i> Non Aktifkan
                  </button>
                </form>
                @elseif ($user->user_status == 'inactive')
                <form action="{{ route('users.status.update', $reporting->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="active">
                  <button type="submit" class="btn btn-success btn-sm mr-2">
                    <i class="ri-checkbox-line"></i> Aktifkan
                  </button>
                </form>
                @endif
              </td>
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
    $('#select-user-status-filter').change(e => {
      window.location.href = `{{ route("users.index") }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
    });
  });
</script>
@endsection