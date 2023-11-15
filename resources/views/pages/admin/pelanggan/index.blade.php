@extends('layouts.admin')

@section('title', 'Pelanggan')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4"><a href="{{ route('dashboard.index') }}">Dashboard</a> &LongRightArrow; Pelanggan</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i>
        </a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Kartu</th>
                <th>Action</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Kartu</th>
                <th>Action</th>
              </tr>
            </tfoot>

            <tbody>
              @foreach ($pelanggan as $cust)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $cust->kode }}</td>
                  <td>{{ $cust->nama }}</td>
                  <td>{{ $cust->jk }}</td>
                  <td>{{ $cust->tmp_lahir }}</td>
                  <td>{{ $cust->tgl_lahir }}</td>
                  <td>{{ $cust->email }}</td>
                  <td>{{ $cust->kartu->nama }}</td>
                  <td>
                    <!-- ./edit-btn -->
                    <a href="{{ route('pelanggan.edit', $cust->id) }}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>

                    <!-- ./delete-btn -->
                    <a href="{{ route('pelanggan.destroy', $cust->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                      <i class="fas fa-trash" data-confirm-delete="true"></i>
                    </a>

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

@push('after-script')
  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush
