@extends('ecommerce.layout')
@section('content')

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto;">
  <iframe
        title="Dior Addict - The New Icon of Shine"
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
        src="https://www.youtube.com/embed/Vpozma3GnGw?autoplay=1&loop=1&playlist=Vpozma3GnGw&mute=1"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen>
    </iframe>
</div>
  <!-- Trend Products start -->
  <h3 class="mt-5 bg-red">Trend Product</h3>
<div class="container">
<div class="row">

 <div class="col-md-3">
  <div class="card" style="width:300px">
  <img class="card-img-top" src="/image/eyeliner.jpg" alt="Card image" style="height:300px">
  <div class="card-body">
    <h4 class="card-title">Maybelline</h4>
    <p class="card-text">18000</p>
    <div>
<i class="fa fa-eye me-3" style="font-size:20px"></i>
<i class="fa fa-heart me-3" style="font-size:20px"></i>
<a href="{{route('detail',1)}}"><i class="fa fa-shopping-cart" style="font-size:20px;color:black"></i></a>
  
</div>  
    <!-- <a href="#" class="btn btn-primary"> View Detail <i class="fa-solid fa-forward" style="color: #74C0FC;"></i></a> -->
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="card " style="width:300px">
  <img class="card-img-top h-300px" src="/image/eyeshadow.jpg" alt="Card image" style="height:300px">
  <div class="card-body">
    <h4 class="card-title">Dior</h4>
    <p class="card-text">32000</p>
    <div>
<i class="fa fa-eye me-3" style="font-size:20px"></i>
<i class="fa fa-heart me-3" style="font-size:20px"></i>
<a href="{{route('cartList')}}"><i class="fa fa-shopping-cart" style="font-size:20px;color:black"></i></a>
  
</div>  

    <!-- <a href="#" class="btn btn-primary"> View Detail <i class="fa-solid fa-forward" style="color: #74C0FC;"></i> </a> -->
    </div>
  </div>
</div>

<div class="col-md-3">
  <div class="card" style="width:300px">
    <img class="card-img-top h-300px" src="/image/highlighter.jpg" alt="Card image" style="height:300px">
      <div class="card-body">
        <h4 class="card-title">Rare Beauty</h4>
        <p class="card-text">25000</p>
        <div>
<i class="fa fa-eye me-3" style="font-size:20px"></i>
<i class="fa fa-heart me-3" style="font-size:20px"></i>
<a href="{{route('cartList')}}"><i class="fa fa-shopping-cart" style="font-size:20px;color:black"></i></a>
  
</div>  
      <!-- <a href="#" class="btn btn-primary"> View Detail <i class="fa-solid fa-forward" style="color: #74C0FC;"></i> </a> -->
    </div>
  </div>
</div>

<div class="col-md-3">
  <div class="card" style="width:300px ;">
    <img class="card-img-top h-300px" src="/image/powder.jpg" alt="Card image" style="height:300px">
      <div class="card-body">
        <h4 class="card-title">Banana</h4>
        <p class="card-text">30000</p>
<div>
<i class="fa fa-eye me-3" style="font-size:20px"></i>
<i class="fa fa-heart me-3" style="font-size:20px"></i>
<a href="{{route('cartList')}}"><i class="fa fa-shopping-cart" style="font-size:20px;color:black"></i></a>
  
</div>     
 <!-- <a href="#" class="btn btn-primary"> View Detail <i class="fa-solid fa-forward" style="color: #74C0FC;"></i> </a> -->
    </div>
  </div>
</div>

</div>
</div>
  <!-- Trend Products start -->
  <!-- New Arrival Products start -->
<h3 class="mt-5">New Arrival</h3>
<div class="container">
  <div class="row">
      @foreach($newproducts as $p)
      @csrf
    <div class="col-md-3">
      <div class="card" style="width:300px ;">
        <img class="card-img-top h-300px" src="/image/{{$p['img_name']}}" alt="Card image" style="height:300px">
          <div class="card-body">
            <h4 class="card-title">{{$p['brand']}}</h4>
            <p class="card-text">{{$p['price']}}</p>    
            <a href="{{route('detail',$p->id)}}" class="btn btn-primary"> View Detail <i class="fa-solid fa-forward" style="color: #74C0FC;"></i> </a>
        </div>
      </div>
    </div>
    @endforeach
</div>
</div>
<!-- New Arrival Products end -->







@endsection