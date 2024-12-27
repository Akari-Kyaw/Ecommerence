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
    <form action="{{route('user.message')}}" method="post" style="width:500px"class="m-auto mt-5">
        @csrf 
            <div class="mb-3 ">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control"  value="{{session()->get('user')->name}}" required>
            </div>

            <div class="mb-3 ">
                <label class="form-label">Email:</label>
                <input type="text" class="form-control"  value="{{session()->get('user')->email}}" required>
            </div>

            <div class="mb-3 ">
                <label class="form-label">Message</label>
                <textarea class="form-control"  rows="6" name="msg" required></textarea> 
            </div>

            <div class="input-group mb-3 d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="send"  name="" required>
                <input type="reset" class="btn btn-danger ms-3" value="cancel" name="" required>
            </div>

    </form>
@endsection

