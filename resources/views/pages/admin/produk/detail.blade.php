@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('content')
  <div class="container-fluid">

    @foreach ($produk as $pr)
      <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
          <div class="row gx-4 gx-lg-5 align-items-center">

            <div class="col-md-6">
              @empty($pr->foto)
                <img class="card-img-top mb-5 mb-md-0" src="{{ asset('backend/img/placeholder.jpg') }}" alt="foto" />
              @else
                <img class="card-img-top mb-5 mb-md-0" src="{{ asset('backend/img/' . $pr->foto) }}" alt="foto" />
              @endempty
            </div>

            <div class="col-md-6">
              <div class="small mb-1">{{ $pr->kode }}</div>
              <h1 class="display-5 fw-bolder">{{ $pr->nama }}</h1>
              <div class="fs-5 mb-5">
                <!-- <span class="text-decoration-line-through">$45.00</span> -->
                <span>Rp. {{ number_format($pr->harga_jual, 0, ',', '.') }}</span>
              </div>

              <p class="lead">{{ $pr->deskripsi }}</p>
              <div class="d-flex">
                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                  <i class="bi-cart-fill me-1"></i>
                  Add to cart
                </button>
              </div>
            </div>

          </div>
        </div>
      </section>
    @endforeach

  </div>
@endsection
