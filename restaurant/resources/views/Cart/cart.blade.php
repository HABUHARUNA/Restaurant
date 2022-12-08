{{-- <x-guest-layout> --}}
@extends('layouts.cart')
@section('content')
    

  <table id="cart" class="table-auto">
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
      @if(session('cart'))
          @foreach(session('cart') as $id => $details)
              @php $total += $details['price'] * $details['quantity'] @endphp
              <tr data-id="{{ $id }}">
                  <td data-th="Product">
                      <div class="row" id="change">
                        <div class="w-full rounded"><img src="{{Storage::url($details['image'])}}" width="100" height="100" class="img-responsive"/></div>
                          <div class="col-sm-9">
                              <h4 class="nomargin mt-2 text-xl font-semibold tracking-tight text-green-600 uppercase mb-2" style="font-size: 20px">{{ $details['name'] }}</h4>
                          </div>
                      </div>
                  </td>
                  <td data-th="Price">${{ $details['price'] }}</td>
                  <td data-th="Quantity">
                      <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                  </td>
                  <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                  <td class="actions" data-th="">
                      <a href="{{route('remove.from.cart', $id)}}"><button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button></a>
                      {{-- <a href="{{route('update.cart', $id)}}" class="btn btn-warning">Update</a> --}}
                  </td>
              </tr>
          @endforeach
      @endif
  </tbody>
  <tfoot>
    <tr>
        <td colspan="5" class="text-right"><h3><strong>Total ${{ $total}}</strong></h3></td>
    </tr>
    <tr>
        <td colspan="5" class="text-right">
            <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            <a href="payment/page"><button class="btn btn-success">Checkout</button></a>
        </td>
    </tr>
</tfoot>
</table>
@endsection

@section('scripts')
    

<script type="text/javascript">
  
  $(".update-cart").change(function (e) {
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
          success: function (response) {
             window.location.reload();
          }
      });
  });

</script>
@endsection
{{-- </x-guest-layout> --}}