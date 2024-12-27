@extends('ecommerce.layout')
@section('content')
@if($errors->any())
<div class="alert alert-warning text-danger">
  <ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{route('registerPost')}}" method="post" style="width:500px"class="m-auto mt-5" >
@csrf
<div class="mb-3 ">
    <label class="form-label">Username</label>
  <input type="text" class="form-control" placeholder="Username" name="name">
  </div>  
<div class="mb-3 ">
    <label class="form-label">Email</label>
  <input type="text" class="form-control" placeholder="Email" name="email">
  </div>

  <div class="mb-3">
  <label class="form-label">Password</label>

    <input type="password" class="form-control" placeholder="Password" name="password">
  </div>
  <div class="mb-3">
  <label class="form-label">Confirm Password</label>

    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
  </div>

  <div class="input-group mt-2">
    <input type="submit" class="form-control bg-primary " value="Register">
    <input type="reset" class="form-control bg-gray ms-2" value="Cancel">

  </div>
  <div class="mt-3 mb-5">
    Already have Account? <a href="{{route('login')}}">LogIn</a>
  </div>

</form>
@endsection
