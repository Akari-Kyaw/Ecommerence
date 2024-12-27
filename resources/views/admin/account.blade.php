@extends('admin.layout')
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
    <form action="{{route('create')}}" method="post" style="width:500px"class="m-auto mt-5" >
        @csrf
        <div class="mb-3 ">
            <label class="form-label">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="name" required>
        </div>  
        <div class="mb-3 ">
            <label class="form-label">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email"required>
        </div>

        <div class="mb-3">
        <label class="form-label">Password</label>

            <input type="password" class="form-control" placeholder="Password" name="password"required>
        </div>
        
        <div class="input-group mt-2">
            <input type="submit" class="form-control bg-primary " value="Register">
            <input type="reset" class="form-control bg-gray ms-2" value="Cancel">

        </div>
    

    </form>
@endsection