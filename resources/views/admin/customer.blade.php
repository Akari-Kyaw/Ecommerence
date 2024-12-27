@extends('admin.layout')
@section('content')
  <div class="container mt-3">
    <table class="table">
      <thead class="table-danger">
        <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Remove</th>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
      <td><a href="{{route('delete',$user->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="mt-3 text-center d-flex justify-content-center">
            {{$users->links()}}
  </div>

@endsection
