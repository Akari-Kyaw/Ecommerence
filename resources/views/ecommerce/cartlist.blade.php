@extends('ecommerce.layout')
@section('content')
<?php
$total=0
?>
@if($list->count()>0)
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
        @foreach($list as $cart)
        @csrf
      <tr>
        <td>{{$cart->category}}</td>
        <td>{{$cart->brand}}</td>
        <td><img src="/image/{{$cart->img_name}}" alt="" style="width:100px;height:100px" ></td>
        <td>{{$cart->color}}</td>
        <td><a href="{{route('decrease',['id'=>$cart->cart_id,'qty'=>$cart->qty])}}" class="btn btn-primary me-3">-</a>{{$cart->qty}} <a href="/ecommerce/cartlistIn/{{$cart->cart_id}}/{{$cart->qty}}" class="btn btn-primary ms-3">+</a></td>
        <td>{{$cart->price}}</td>
        <td>{{$cart->price*$cart->qty}}</td>
        <td><a href="{{route('remove',$cart->cart_id)}}" class="btn bg-danger text-light">Remove</a></td>


      </tr>
      <input type="hidden" value="{{$total += $cart->price * $cart->qty}}">
      @endforeach
    </tbody>
  </table>
  <form action="{{route('checkOut',$total)}}" method="post" style="text-align:center">
    @csrf
    @if($total>0)
  <input type="submit" value="checkout" class="btn bg-danger text-light">
  @endif
  </form>
  @else
  <h1 class="mt-5" style="text-align:center">No CartList</h1>
  @endif
  @endsection