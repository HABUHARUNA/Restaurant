
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <link rel="stylesheet" href="styles.css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body>
      <!DOCTYPE html>
      <html>
      <head>
          <title>Laravel Add To Cart Function - ItSolutionStuff.com</title>
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
                  <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{url('user/register')}}">Register</a>
      
        <div class="row">
           
                <div class="dropdown">
                    <button type="button" class="btn btn-info text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400" data-toggle="dropdown" >
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
          {{-- @if(session()->has('success'))
                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 .">
                    <span class="text-xl inline-block mr-5 align-middle">
                      <i class="fas fa-bell" >
                    </span>
                        <span class="inline-block align-middle mr-8">
                          <b class="capitalize">{{session()->get('success')}}</b> 
                        </span>
                </div>
              @endif --}}
        <div class="font-sans text-gray-900 antialiased min-h-screen">
            {{ $slot }}
        </div>
        {{-- <div class="container">
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div> 
            @endif
        </div> --}}
          <footer class="bg-gray-800 border-t border-gray-200">
            <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
              <div class="flex flex-wrap justify-center">
                <ul class="flex items-center space-x-4 text-white">
                  <li>Home</li>
                  <li>About</li>
                  <li>Contact</li>
                  <li>Terms</li>
                </ul>
              </div>
              <div class="flex justify-center mt-4 lg:mt-0">
                <a>
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-blue-600" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                  </svg>
                </a>
                <a class="ml-3">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-blue-300" viewBox="0 0 24 24">
                    <path
                      d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                    </path>
                  </svg>
                </a>
                <a class="ml-3">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-pink-400" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                  </svg>
                </a>
                <a class="ml-3">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="0" class="w-6 h-6 text-blue-500" viewBox="0 0 24 24">
                    <path stroke="none"
                      d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                  </svg>
                </a>
              </div>
            </div>
          </footer>
    </body>
</html>

