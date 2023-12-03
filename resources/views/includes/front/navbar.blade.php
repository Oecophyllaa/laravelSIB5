<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

  <div class="container">
    <a class="navbar-brand" href="{{ route('front.index') }}">Furni<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('front.index') }}/#">Home</a>
        </li>
        @auth
          <li><a class="nav-link" href="{{ route('front.shop') }}">Shop</a></li>
        @endauth
        <li><a class="nav-link" href="#">About us</a></li>
        <li><a class="nav-link" href="#">Services</a></li>
        <li><a class="nav-link" href="#">Blog</a></li>
        <li><a class="nav-link" href="#">Contact us</a></li>
      </ul>

      <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <li><a class="nav-link" href="{{ route('login') }}"><img src="{{ asset('frontend/images/user.svg') }}"></a></li>
        @auth
          <!-- Logout -->
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          <!-- End Logout -->

          {{-- <li><a class="nav-link" href="#"><img src="{{ asset('frontend/images/cart.svg') }}"></a></li> --}}

          <!-- Cart Section -->
          <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </button>

            <div class="dropdown-menu">
              <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                    class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </div>
                @php $total = 0 @endphp
                @foreach ((array) session('cart') as $id => $details)
                  @php $total += $details['harga_jual'] * $details['quantity'] @endphp
                @endforeach
                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                  <p>Total: <span class="text-info"> Rp{{ number_format($total, 0, ',', '.') }} </span></p>
                </div>
              </div>
              @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                  <div class="row cart-detail">
                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                      @empty($details['foto'])
                        <img src="{{ asset('backend/img/placeholder.jpg') }}" />
                      @else
                        <img src="{{ asset('backend/img/' . $details['foto']) }}" />
                      @endempty
                    </div>

                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                      <p>{{ $details['nama'] }}</p>
                      <span class="price text-info"> Rp{{ number_format($details['harga_jual'], 0, ',', '.') }}</span>
                      <span class="count"> Quantity:{{ $details['quantity'] }} </span>
                    </div>
                  </div>
                @endforeach
              @endif
              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                  <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Cart Section -->
        @endauth

      </ul>
    </div>
  </div>

</nav>
