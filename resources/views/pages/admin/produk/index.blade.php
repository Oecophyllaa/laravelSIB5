@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">DataTabel Produk</h1> --}}
    <p class="mb-4"><a href="{{ route('dashboard.index') }}">Dashboard</a> &LongRightArrow; Produk</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="{{ url('admin/produk/create') }}" class="btn btn-primary">
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
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Minimal Stok</th>
                <th>Jenis Produk</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Minimal Stok</th>
                <th>Jenis Produk</th>
              </tr>
            </tfoot>

            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product->kode }}</td>
                  <td>{{ $product->nama }}</td>
                  <td>{{ $product->harga_beli }}</td>
                  <td>{{ $product->harga_jual }}</td>
                  <td>{{ $product->stok }}</td>
                  <td>{{ $product->min_stok }}</td>
                  <td>{{ $product->jenis_produk->nama }}</td>
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
