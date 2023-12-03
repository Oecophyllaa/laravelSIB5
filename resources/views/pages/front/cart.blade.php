@extends('layouts.front')

@section('content')
  <!-- Start Hero Section -->
  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Cart</h1>
          </div>
        </div>
        <div class="col-lg-7">

        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      @php $total = 0 @endphp
      @if (session('cart'))
        @foreach (session('cart') as $id => $details)
          @php $total += $details['harga_jual'] * $details['quantity'] @endphp
          <tr data-id="{{ $id }}">
            <td data-th="Product">
              <div class="row">
                <div class="col-sm-3 hidden-xs">
                  @empty($details['foto'])
                    <img src="{{ asset('backend/img/placeholder.jpg') }}" width="100" height="100" class="img-responsive" />
                  @else
                    <img src="{{ asset('backend/img/' . $produk->foto) }}" width="100" height="100" class="img-responsive" />
                  @endempty
                </div>
                <div class="col-sm-9">
                  <h4 class="nomargin">{{ $details['nama'] }}</h4>
                </div>
              </div>
            </td>
            <td data-th="Price">Rp{{ number_format($details['harga_jual'], 0, ',', '.') }}</td>
            <td data-th="Quantity">
              <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
            </td>
            <td data-th="Subtotal" class="text-center">Rp{{ number_format($details['harga_jual'] * $details['quantity'], 0, ',', '.') }}</td>
            <td class="actions" data-th="">
              <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5" class="text-right">
          <h3><strong>Total Rp{{ number_format($total, 0, ',', '.') }}</strong></h3>
        </td>
      </tr>
      <tr>
        <td colspan="5" class="text-right">
          <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
          <button class="btn btn-success">Checkout</button>
        </td>
      </tr>
    </tfoot>
  </table>
@endsection

@push('after-script')
  <script type="text/javascript">
    $(".update-cart").change(function(e) {
      e.preventDefault();

      var ele = $(this);

      $.ajax({
        url: '{{ route('update.cart') }}',
        method: "patch",
        data: {
          _token: '{{ csrf_token() }}',
          id: ele.parents("tr").attr("data-id"),
          quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function(response) {
          window.location.reload();
        }
      });
    });

    $(".remove-from-cart").click(function(e) {
      e.preventDefault();

      var ele = $(this);

      if (confirm("Are you sure want to remove?")) {
        $.ajax({
          url: '{{ route('remove.from.cart') }}',
          method: "DELETE",
          data: {
            _token: '{{ csrf_token() }}',
            id: ele.parents("tr").attr("data-id")
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });
  </script>
@endpush
