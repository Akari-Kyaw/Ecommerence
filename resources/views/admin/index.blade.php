@extends('admin.loginLayout')
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
<form action="{{route('indexPost')}}"method="post" style="width:500px"class="m-auto mt-5" >
@csrf
  <div class="mb-3 ">
    <label class="form-label">Email</label>
  <input type="email" class="form-control" placeholder="Email" name="email">
  </div>

  <div class="mb-3">
  <label class="form-label">Password</label>

    <input type="password" class="form-control" placeholder="Password" name="password">
  </div>

  <div class="input-group mt-2">
    <input type="submit" class="form-control bg-primary " value="login">
    <input type="reset" class="form-control bg-gray ms-2" value="Cancel">

  </div>
  
</form>
@endsection