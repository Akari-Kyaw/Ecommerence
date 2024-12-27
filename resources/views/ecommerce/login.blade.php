@extends('ecommerce.layout')
@section('content')
      <form action="{{route('loginPost')}}"method="post" style="width:500px"class="m-auto mt-5" >
      @csrf
        <div class="mb-3 ">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Email" name="email">
          @error('email')
          <span class="textdanger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="password">
          @error('password')
          <span class="textdanger">{{$message}}</span>
          @enderror
        </div>

        <div class="input-group mt-2">
          <input type="submit" class="form-control bg-primary " value="login">
          <input type="reset" class="form-control bg-gray ms-2" value="Cancel">
        </div>
        
        <div class="mt-3">
          Create New Account? <a href="{{route('register')}}">Sign Up</a>
        </div>
    </form>
@endsection
