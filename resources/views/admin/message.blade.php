@extends('admin.layout')
@section('content')
    <div class="container mt-3">
    <table class="table">
        <thead class="table-dark text-light">
        <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Message</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
        <tr>
        <td>{{$message->name}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->msg}}</td>
        <td><a href="{{route('message.Delete',$message->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach

        </tbody>
    </table>
    </div>
@endsection