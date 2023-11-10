@extends('layouts.admin')

@section('title', 'Add Produk')

@section('content')
  <div class="container-fluid">
    <form method="POST" action="{{ url('admin/produk/store') }}" enctype="multipart/form-data">
      @csrf

      <div class="form-group row">
        <label for="kode" class="col-2 col-form-label text-right">Kode</label>
        <div class="col-8">
          <input type="text" id="kode" name="kode" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="nama" class="col-2 col-form-label text-right">Nama</label>
        <div class="col-8">
          <input type="text" id="nama" name="nama" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="harga_beli" class="col-2 col-form-label text-right">Harga Beli</label>
        <div class="col-8">
          <input type="text" id="harga_beli" name="harga_beli" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="harga_jual" class="col-2 col-form-label text-right">Harga Jual</label>
        <div class="col-8">
          <input type="text" id="harga_jual" name="harga_jual" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="stok" class="col-2 col-form-label text-right">Stok</label>
        <div class="col-8">
          <input type="text" id="stok" name="stok" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="min_stok" class="col-2 col-form-label text-right">Minimal Stok</label>
        <div class="col-8">
          <input type="text" id="min_stok" name="min_stok" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="foto" class="col-2 col-form-label text-right">Foto</label>
        <div class="col-8">
          <input type="file" id="foto" name="foto" class="form-control" />
        </div>
      </div>

      <div class="form-group row">
        <label for="deskripsi" class="col-2 col-form-label text-right">Deskripsi</label>
        <div class="col-8">
          <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control"></textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="select" class="col-2 col-form-label text-right">Jenis Porduk</label>
        <div class="col-8">
          <select id="select" name="jenis_produk_id" class="custom-select">
            @foreach ($jenis_produk as $jenis)
              <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="offset-2 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
