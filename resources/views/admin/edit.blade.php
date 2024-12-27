@extends('admin.layout')
@section('content')
    @foreach($product as $p)

        <form action="{{route('update',['pid'=>$p->id,'detailId'=>$p->detailId])}}"method="post" style="width:500px"class="m-auto mt-5" >
            @csrf
                <div class="mb-3 ">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control"  name="category" value="{{$p->category}}">
                </div>

                <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control"  name="brand" value="{{$p->brand}}">
                </div>

                <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" class="form-control"  name="color" value="{{$p->color}}">
                </div>

                <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control"  name="price" value="{{$p->price}}">
                </div>

                <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control"  name="stock_qty" value="{{$p->stock_qty}}">
                </div>

            <div class="input-group mt-2">
                <input type="submit" class="form-control bg-primary " value="Update">

            </div>
            
        </form>
    @endforeach

@endsection