@extends('admin.layout')
@section('content')
<div class="container mt-3">
  <table class="table">
    <thead class="table-info">
      <tr>
        <th>Category</th>
          <th>Brand</th>
          <th>Image</th>
          <th>Color</th>
          <th>Price</th>
          <th>Quantity</th>
          <th></th>
          <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        @csrf
      <tr>
            <td>{{$product->category}}</td>
            <td>{{$product->brand}}</td>
            <td><img src="/image/{{$product->img_name}}" alt="" style="width:100px;height:100px" ></td>
            <td>{{$product->color}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock_qty}}</td>
            <td><a href="{{route('edit',['pid'=>$product->id,'detailId'=>$product->detailId])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{route('delete',$product->detailId)}}" class="btn btn-danger">Delete</a></td>
      </tr>
</tbody>
@endforeach

</table>
<div class="mt-3 d-flex justify-content-center">
{{$products->links()}}
</div>

@endsection