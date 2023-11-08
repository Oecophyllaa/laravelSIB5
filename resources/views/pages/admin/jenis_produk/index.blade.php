@extends('layouts.admin')

@section('title', 'Jenis Produk')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <p class="mb-4"><a href="{{ route('dashboard.index') }}">Dashboard</a> &LongRightArrow; Jenis Produk</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="{{ url('admin/jenis-produk/create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i>
        </a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>
            </tfoot>

            <tbody>
              @foreach ($jenis_produk as $jp)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jp->nama }}</td>
                  <td>
                    ubah
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
