@extends('ecommerce.layout')
@section('content')
    @if(sizeof($searchProducts))
        <div class="container">
            <div class="row">
                    @foreach($searchProducts as $p)
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
                    <div class="mt-5">
                    {{$searchProducts->appends(['search'=>request()->input('search')])->links()}}
                    </div>
                </div>
        </div>
        @else
        <div class="text-center mt-5"><h3><i class="fa-solid fa-magnifying-glass"></i>No Search Data Found</h3></div>
    @endif
@endsection
