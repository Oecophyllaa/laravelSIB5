@extends('layouts.admin')

@section('title', 'Add Jenis')

@section('content')
  <div class="container-fluid">
    <form action="{{ url('admin/jenis-produk/store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group row">
        <label for="nama" class="col-2 col-form-label">Nama Jenis</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-address-card"></i>
              </div>
            </div>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Isi jenis produk" />
          </div>
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
