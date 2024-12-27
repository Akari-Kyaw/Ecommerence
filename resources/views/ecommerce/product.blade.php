@extends('ecommerce.layout')
@section('content')
<div class="container">
  <div class="row">
         @foreach($products as $p)
         @csrf
            <div class="col-md-3">
                <div class="card mt-3" style="width:300px ;">
                    <img class="card-img-top h-300px" src="/image/{{$p['img_name']}}" alt="Card image" style="height:300px">
                    <div class="card-body">
                        <h4 class="card-title">{{$p['brand']}}</h4>
                        <p class="card-text">{{$p['price']}}</p>    
                        <a href="{{route('detail',$p->id)}}" class="btn btn-primary"> View Detail <i class="fa-solid fa-forward" style="color: #74C0FC;"></i> </a>
                    </div>
                </div>
            </div>
         @endforeach
         <div class="mt-3 text-center d-flex justify-content-center">
            {{$products->links()}}
         </div>
    </div>
</div>
@endsection