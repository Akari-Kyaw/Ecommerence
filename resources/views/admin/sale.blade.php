@extends('admin.layout')
@section('content')
<div class="container mt-3">
  <table class="table">
    <thead class="table-warning">
      <tr>
            <th>Customer</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Payment</th>

     </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
      <tr>
            <td>{{$order->name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->category}}</td>
            <td>{{$order->brand}}</td>
            <td>{{$order->color}}</td>
            <td>{{$order->qty}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->price*$order->qt}}</td>
            <td>{{$order->payment}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection