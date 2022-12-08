<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>BawaFood</title>
  </head>
  <body>
    {{-- @if(Auth::check()) --}}
    {{-- <h1>BawaFood Payment</h1> --}}
    @if(session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div> 
    @endif
      <div class="container">
          <div class="header px-5 text-center bg-primary py-5">
              <h1>Pay for services</h1>
            
          </div>
          <div class="main mt-2">
              <form  action="{{Route('pay')}}" method="POST">
                @csrf
                  <div class="row">
                      <div class="col-6">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" id="name" class="form-control" required >
                          </div>
                      </div>
                      <div class="col-6">  
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control" required>
                          </div>
                      </div>
                      @php $total = 0 @endphp
                      @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                      @endforeach
                      <div class="col-6">  
                          <div class="form-group">
                              <label for="amont">Amount</label>
                              <input type="number" name="amount" id="amount" class="form-control" required value="{{ $total }}">
                          </div>
                      </div>
                      <div class="col-6">  
                          <div class="form-group">
                              <label for="phone">Phone Number</label>
                              <input type="text" name="number" id="number" class="form-control" required>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Pay Now</button>
                </form>
          </div>
      </div> 
    {{-- @endif --}}
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script src="https://checkout.flutterwave.com/v3.js"></script>

{{-- <script>
    $(function(){
        $("#makePayment").submit(function (e){
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#number").val();
            var amount = $("#amount").val();
            // make payment
            makePayment(amount,email,phone,name);
        })
    })

  function makePayment(amount,email,phone_number,name) {
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
      tx_ref: "RX1_{{substr(rand(0,time()),0,10)}}",
      amount,
      currency: "NGN",
      payment_options: "card, banktransfer, ussd", 

      customer: {
        email,
        phone_number,
        name,
      },
      customizations: {
        title: "BawaFood",
        description: "Payment for an ordered food",
        logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
      },
    });
  }
</script> --}}
  </body>
</html>