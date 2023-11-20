@extends('layouts.admin')

@section('title', 'Edit Pelanggan')

@section('content')
  <div class="container-fluid">
    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group row">
        <label for="kode" class="col-2 col-form-label text-right">Kode</label>
        <div class="col-8">
          <input type="text" id="kode" name="kode" value="{{ $pelanggan->kode }}" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="nama" class="col-2 col-form-label text-right">Nama</label>
        <div class="col-8">
          <input type="text" id="nama" name="nama" value="{{ $pelanggan->nama }}" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-2 text-right">Jenis Kelamin</label>
        <div class="col-8">
          @foreach ($gender as $g)
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jk" id="radio_{{ $loop->iteration }}" class="custom-control-input" value="{{ $g }}"
                {{ $pelanggan->jk == $g ? 'checked' : '' }} />
              <label for="radio_{{ $loop->iteration }}" class="custom-control-label">{{ $g }}</label>
            </div>
          @endforeach
        </div>
      </div>

      <div class="form-group row">
        <label for="text2" class="col-2 col-form-label text-right">Tempat Lahir</label>
        <div class="col-8">
          <input type="text" id="text2" name="tmp_lahir" value="{{ $pelanggan->tmp_lahir }}" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="text3" class="col-2 col-form-label text-right">Tanggal Lahir</label>
        <div class="col-8">
          <input type="date" id="text3" name="tgl_lahir" value="{{ $pelanggan->tgl_lahir }}" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="text4" class="col-2 col-form-label text-right">Email</label>
        <div class="col-8">
          <input type="text" id="text4" name="email" value="{{ $pelanggan->email }}" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="select" class="col-2 col-form-label text-right">Kartu</label>
        <div class="col-8">
          <select id="select" name="kartu_id" class="custom-select">
            @foreach ($kartu as $k)
              <option value="{{ $k->id }}" {{ $pelanggan->kartu_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
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
