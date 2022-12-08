<x-guest-layout>
    @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div> 
    @endif
    @if(session('danger'))
        <div class="alert alert-danger">
        {{ session('danger') }}
        </div> 
    @endif

    <form action="{{Route('user.register')}}" method="POST">
        @csrf
    <div class="sm:col-span-6">
        {{-- <label for="name" class="block text-sm font-medium text-gray-700"> Name </label> --}}
        <div class="mt-1 mb-3 mx-5">
          <input type="text" id="fullname"  name="fullname" value="{{old('fullname')}}" placeholder="Enter Fullname" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required />
          <span class="text-danger">@error('fullname'){{ $message }} @enderror</span>
        </div>
        <div class="sm:col-span-6">
          {{-- <label for="name" class="block text-sm font-medium text-gray-700"> Quantity </label> --}}
          <div class="mt-1 mb-3 mx-5">
            <input type="text" id="emailAddress"  name="emailAddress" value="{{old('emailAddress')}}" placeholder="Enter Email" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required />
            <span class="text-danger">@error('emailAddress'){{ $message }} @enderror</span>
          </div>
      </div>
      <div class="sm:col-span-6">
        {{-- <label for="name" class="block text-sm font-medium text-gray-700"> Quantity </label> --}}
        <div class="mt-1 mb-3 mx-5">
          <input type="text" id="number"  name="number" value="{{old('number')}}" placeholder="Enter Phone Number" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required />
          <span class="text-danger">@error('number'){{ $message }} @enderror</span>
        </div>
      </div>
      <div class="sm:col-span-6">
        {{-- <label for="password" class="block text-sm font-medium text-gray-700"> Password </label> --}}
        <div class="mt-1 mb-3 mx-5">
          <input type="text" id="password"  name="password" value="{{old('password')}}" placeholder="Enter Password" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="sm:col-span-6">
          {{-- <label for="title" class="block text-sm font-medium text-gray-700"> Confirm Password </label> --}}
        <div class="mt-1 mb-2 mx-5">
          <input type="text" id="password_confirmation"  name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
          <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
        </div>
      </div>
      <div class="mt-6 p-4">
        <button type ="submit" class="px-4 py-2 text-gray-700 bg-current  dark:text-gray-200 dark:bg-gray-800 rounded-lg">Register</button>
        </div>
    </form>
</x-guest-layout>