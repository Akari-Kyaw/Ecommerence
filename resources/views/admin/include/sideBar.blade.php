<?php

use App\Http\Controllers\AdminController;

    if(AdminController::messageCount()>0)
    $msgCount=AdminController::messageCount();
    else
    $msgCount=""
?>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary container-fluid">

        <!-- Start Vertical Navigation Bar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
            id="navbarVertical">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand mb-md-3" href="#">

                    <div class="d-inline-block">
                        <img src="/images/favicon.png" alt="... ">
                    </div>
                    <div class="d-inline-block">
                        <b class="ms-2">Your
                            Logo</b>
                    </div>
                </a>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!-- Navigation -->
                    <div class="d-flex">
                        <img src="/images/user.jpg" alt="" class="rounded-circle w-25">
                        <div class="m-auto">
                            <p class="p-0 m-0 text-danger fw-bold text-uppercase">{{auth('admin')->user()->name}}</p>
                            <p class="p-0 m-0">Sales Manager</p>
                        </div>
                    </div><br>
                    <div>
                        <h4>Ecommerce</h4>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">
                                <i class="fa fa-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminorder')}}">
                                <i class="fa-solid fa-clipboard-list"></i> Order
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminproduct')}}">
                                <i class="fa-solid fa-truck"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('add')}}">
                                <i class="fa-solid fa-folder-open"></i> Add Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer')}}">
                                <i class="fa-solid fa-id-badge"></i> Customer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sale')}}">
                                <i class="fa-solid fa-receipt"></i> Sale
                            </a>
                        </li>

                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">

                    <div>
                        <h4>Apps</h4>
                    </div>
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('message')}}">
                                <i class="fa-solid fa-envelope"></i> Message
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <div>
                        <h4>Pages</h4>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('account')}}">
                                <i class="fa-regular fa-address-card"></i> Account
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('profile')}}">
                                <i class="fa-solid fa-gear"></i> Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.logout')}}">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- End Vertical Navigation Bar --}}
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-md-4 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                            </div>
                            <div class="col-sm-6 col-md-4 mb-4 mb-sm-0">

                                <form action="{{route('adminsearch')}}" method="">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <input type="text" name="search" id="" placeholder="Search . . . "
                                            class="w-100 form-control ms-2">
                                    </div>
                                </form>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-md-4 text-sm-end">
                                <div class="mx-n1">
                                    <a href="{{route('message')}}" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                        <span class="">
                                            <i class="fa-solid fa-bell h5 d-block m-auto"><sup class="alert-danger">{{$msgCount}}</sup> </i>
                                        </span>
                                    </a>
                                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                        <span>
                                            <i class="fa-solid fa-cart-shopping h5 d-block m-auto"></i>
                                        </span>
                                    </a>
                                    <a href="{{route('add')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class="m-auto">
                                            <i class="fa-solid fa-circle-plus"></i>
                                        </span>
                                        <span class="ms-2 p-1">Add Product</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
    @yield('content')

        </div>
    </div>
