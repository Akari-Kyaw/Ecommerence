@extends('admin.layout')
@section('content')
<form action="" method="post" style="width:500px"class="m-auto mt-5" >
        @csrf
        @foreach($admins as $admin)
        <div class="mb-3 ">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="name" value="{{$admin->name}}" required>
        </div>  
        <div class="mb-3 ">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$admin->email}}"  required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" value="{{$admin->password}}"  required>
        </div>
        
        <div class="input-group mt-2">
            <input type="submit" class="form-control bg-primary " value="Update">
            <input type="reset" class="form-control bg-gray ms-2" value="Cancel">
        </div>
        @endforeach
    </form>

@endsection