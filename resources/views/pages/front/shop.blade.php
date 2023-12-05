@extends('layouts.front')

@section('content')
  @auth
    <!-- Start Hero Section -->
    <div class="hero">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5">
            <div class="intro-excerpt">
              <h1>Shop</h1>
            </div>
          </div>
          <div class="col-lg-7"></div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Products Section -->
    <div class="untree_co-section product-section before-footer-section">
      <div class="container">
        <div class="row">

          <!-- Start Column 1 -->
          @foreach ($produks as $produk)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
              <a class="product-item" href="{{ route('add.to.cart', $produk->id) }}">
                @empty($produk->foto)
                  <img src="{{ asset('backend/img/placeholder.jpg') }}" class="img-fluid product-thumbnail" />
                @else
                  <img src="{{ asset('backend/img/' . $produk->foto) }}" class="img-fluid product-thumbnail" />
                @endempty
                <h3 class="product-title">{{ $produk->nama }}</h3>
                <strong class="product-price">Rp{{ number_format($produk->harga_jual, 0, ',', '.') }}</strong>

                <span class="icon-cross">
                  <img src="{{ asset('frontend/images/cross.svg') }}" class="img-fluid" />
                </span>
              </a>
            </div>
          @endforeach
          <!-- End Column 1 -->

        </div>
      </div>
    </div>
    <!-- End Products Section -->
  @endauth

  @guest
    <!-- Start Hero Section -->
    <div class="hero">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5">
            <div class="intro-excerpt">
              <h1>Shop</h1>
            </div>
          </div>
          <div class="col-lg-7"></div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section product-section before-footer-section">
      <div class="container">
        <div class="row">
          <a href="{{ route('login') }}" class="btn btn-primary">Silahkan Login Terlebih Dahulu</a>
        </div>
      </div>
    </div>
  @endguest
@endsection
