@extends('admin.layout')
@section('content')
    @if($products->count()>0)
        <div class="container mt-3">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                            <th>Number</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->color}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock_qty}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center mt-5"><h3><i class="fa-solid fa-magnifying-glass"></i>No Search Data Found</h3></div>
    @endif
@endsection