@extends('admin.layout')
@section('content')
<div class="container mt-3">
  <table class="table">
    <thead class="table-success">
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
            <th>Status</th> 
            <th>Order Date</th>
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
            <td>{{$order->price * $order->qt}}</td>
            <td>{{$order->payment}}</td>
                <td class="d-flex flex-column">               
                    <select name="status" id="">
                        <option value="pending">Pending</option>
                        <option value="deliver">Delivery</option>
                    </select>
                    <a href="{{route('status',$order->order_id)}}"><input type="submit" value="Change Status" class="btn btn-success mt-3">
                </a>
                </td>
                
                
            
            <td>{{$order->created_at->format('m-d-y')}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection