@extends('ecommerce.layout')
@section('content')
@if($orders->count()>0)
<table class="table table-hover">
    <thead>
      <tr>
        <th>Category</th>
        <th>Brand</th>
        <th>Image</th>
        <th>Color</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Amount</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        @csrf
      <tr>
            <td>{{$order->category}}</td>
            <td>{{$order->brand}}</td>
            <td><img src="/image/{{$order->img_name}}" alt="" style="width:100px;height:100px" ></td>
            <td>{{$order->color}}</td>
            <td>{{$order->qty}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->price*$order->qty}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <h3  style="text-align:center;text-decoration:underline" >No Current Order</h3>
  @endif
@endsection