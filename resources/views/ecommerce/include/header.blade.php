<?php
use App\Http\Controllers\ProductController;
if(ProductController::countItem()>0)
$count=ProductController::countItem();
else
$count="";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('product')}}">Products</a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Order</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('order')}}">Order History</a></li>
      <li><a class="dropdown-item" href="{{route('currentOrder')}}">Current History </a></li>
    </ul>
  </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('contactus')}}">Contact Us</a>
        </li>

         @if (session()->get('user'))
         <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{session()->get('user')->name}}</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Wishlist</a></li>
    <li><a class="dropdown-item" href="{{route('user.logout')}}">LogOut </a></li>
  </ul>
</li>
  @else
  <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">LogIn</a>
        </li>
        @endif
      </ul>
      <form class="d-flex" action="{{route('search')}}" method="post">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search Category" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="{{route('cartList')}}"><i class="fa-solid fa-cart-shopping" style="color: #ff7b00"><sup style="vertical-align: super; font-size:smaller; padding-left: 3px; ">{{$count}}</i></a>
    </div>
  </div>
</nav>
