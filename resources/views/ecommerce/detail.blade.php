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
@foreach($product as $p)

<form action="{{route('cart',$p->id)}}" method="post">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="/image/{{$p['img_name']}}" alt="" style="width:500PX">
            </div>
            <div class="col-md-6">
                <p>Category:{{$p['category']}}</p>
                <p>Brand:{{$p['brand']}}</p>
                <p>Price:{{$p['price']}}</p>
                <label>Color</label>
                <select name="color" id="">
                <option value="">Select Color</option>
                @foreach($color as $detail)
                    <option value="{{$detail['color']}}">{{$detail['color']}}</option>
                @endforeach
                </select>

                @endforeach
                <div class="mt-3">
                    <label for="">Quantity :</label>
                <input type="number" min="1" name="quantity">
                </div>
                    @csrf
                <input type="submit" class="mt-3"name="addToCart" value="addToCart">
                </form>
            </div>
        </div>
    </div>
@endsection