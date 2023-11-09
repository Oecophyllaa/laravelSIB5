@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
  <div class="container-fluid">

    @foreach ($produk as $pr)
      <form method="POST" action="{{ url('admin/produk/update/' . $pr->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
          <label for="kode" class="col-2 col-form-label text-right">Kode</label>
          <div class="col-8">
            <input type="text" id="kode" name="kode" value="{{ $pr->kode }}" class="form-control" />
          </div>
        </div>

        <div class="form-group row">
          <label for="nama" class="col-2 col-form-label text-right">Nama</label>
          <div class="col-8">
            <input type="text" id="nama" name="nama" value="{{ $pr->nama }}" class="form-control" />
          </div>
        </div>

        <div class="form-group row">
          <label for="harga_beli" class="col-2 col-form-label text-right">Harga Beli</label>
          <div class="col-8">
            <input type="text" id="harga_beli" name="harga_beli" value="{{ $pr->harga_beli }}" class="form-control" />
          </div>
        </div>

        <div class="form-group row">
          <label for="harga_jual" class="col-2 col-form-label text-right">Harga Jual</label>
          <div class="col-8">
            <input type="text" id="harga_jual" name="harga_jual" value="{{ $pr->harga_jual }}" class="form-control" />
          </div>
        </div>

        <div class="form-group row">
          <label for="stok" class="col-2 col-form-label text-right">Stok</label>
          <div class="col-8">
            <input type="text" id="stok" name="stok" value="{{ $pr->stok }}" class="form-control" />
          </div>
        </div>

        <div class="form-group row">
          <label for="min_stok" class="col-2 col-form-label text-right">Minimal Stok</label>
          <div class="col-8">
            <input type="text" id="min_stok" name="min_stok" value="{{ $pr->min_stok }}" class="form-control" />
          </div>
        </div>

        <div class="form-group row">
          <label for="select" class="col-2 col-form-label text-right">Jenis Porduk</label>
          <div class="col-8">
            <select id="select" name="jenis_produk_id" class="custom-select">
              @foreach ($jenis_produk as $jenis)
                <option value="{{ $jenis->id }}" {{ $pr->jenis_produk_id == $jenis->id ? 'selected' : '' }}>
                  {{ $jenis->nama }}
                </option>
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
    @endforeach

  </div>
@endsection
