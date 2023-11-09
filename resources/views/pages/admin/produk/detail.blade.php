@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('content')

  <div class="container-fluid">
    @foreach ($produk as $p)
      <h1>{{ $p->kode }}</h1>
    @endforeach
  </div>

@endsection
