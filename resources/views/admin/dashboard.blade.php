@extends('admin.layout')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary" style="height:200px">
                    <div class="card-body">
                        <h4 class="card-title text-light text-center">Register User</h4>
                        <h4 class="card-title text-light text-center">{{$user}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success" style="height:200px">
                    <div class="card-body">
                        <h4 class="card-title text-light text-center">Order</h4>
                        <h4 class="card-title text-light text-center">{{$order}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning" style="height:200px">
                    <div class="card-body">
                        <h4 class="card-title text-light text-center">Sale Amount</h4>
                        <h4 class="card-title text-light text-center">$ {{$amount}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger" style="height:200px">
                    <div class="card-body">
                        <h4 class="card-title text-light text-center">Message</h4>
                        <h4 class="card-title text-light text-center">{{$msg}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="mt-3">
            Sale By Day
        </h1>
        <div style="width:75%">
            <canvas id=salesChart></canvas>
        </div>

        <h1>
            Order By Day
        </h1>
        <div style="width:75%">
            <canvas id=ordersChart></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx=document.getElementById('salesChart').getContext('2d');
            var salesChart=new Chart(ctx,{
                type:'bar',
                data:{
                    labels:@json($days),
                    datasets:[{
                        label:"Total Sales",
                        data:@json($totals),
                        backgroundColor:["pink","yellow","purple","red","blue","green"]
                    }]
                },
                options: {
                scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
            }
            });

        </script>



<!-- order -->
    
        <script>
            var ctx1=document.getElementById('ordersChart').getContext('2d');
            var ordersChart=new Chart(ctx1,{
                type:'bar',
                data:{
                    labels:@json($odays),
                    datasets:[{
                        label:"Total Orders",
                        data:@json($ototals),
                        backgroundColor:["lightgreen","lightblue","orange","red","blue","green"]
                    }]
                },
                options: {
                scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
            }
            });

        </script>
 @endsection
