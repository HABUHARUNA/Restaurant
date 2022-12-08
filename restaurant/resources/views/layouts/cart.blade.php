<!DOCTYPE html>
<html>
<head>
    <title>BawaFood-Cart </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <link rel="stylesheet" href="styles.css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="bg-white shadow-md" x-data="{ isOpen: false }">
        <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
          <div class="flex items-center justify-between">
            <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
              href="/">
              BawaFood
            </a>
            <!-- Mobile menu button -->
            <div @click="isOpen = !isOpen" class="flex md:hidden">
              <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                aria-label="toggle menu">
                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                  <path fill-rule="evenodd"
                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                  </path>
                </svg>
              </button>
            </div>
          </div>
          
  
          <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
          <div :class="isOpen ? 'flex' : 'hidden'"
            class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
              href="/">Home</a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
              href="{{route('categories.index')}}">Categories</a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
              href="{{route('menus.index')}}">Our Menu</a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
              href="{{route('reservations.step.one')}}">Make reservation</a>
                

  <div class="row" >
     
          <div class="dropdown" >
              <button type="button" class="btn btn-info text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
              </button>
              <div class="dropdown-menu">
                  <div class="row total-header-section">
                      <div class="col-lg-6 col-sm-6 col-6">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                      </div>
                      @php $total = 0 @endphp
                      @foreach((array) session('cart') as $id => $details)
                          @php $total += $details['price'] * $details['quantity'] @endphp
                      @endforeach
                      <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                          <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                      </div>
                  </div>
                  @if(session('cart'))
                      @foreach(session('cart') as $id => $details)
                          <div class="row cart-detail">
                              <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                  <img src="{{Storage::url($details['image'])}}" />
                              </div>
                              <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                  <p>{{ $details['name'] }}</p>
                                  <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
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
      </div>
  </div>

           
          </div>
        </nav>
      </div>




  
<br/>
<div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
  
    @yield('content')
</div>
  
@yield('scripts')
     
</body>
</html>