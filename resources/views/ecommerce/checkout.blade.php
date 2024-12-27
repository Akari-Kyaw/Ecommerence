@extends('ecommerce.layout')
@section('content')
<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td>Total</td>
                <td>{{$totals}}</td>

            </tr>
            <tr>
                <td>Tax:</td>
                <td>0</td>

            </tr>
            <tr>
                <td>Delivery:</td>
                <td>5000</td>

            </tr>
        </tbody>
    </table>
    
    <form action="{{route('currentPost')}}" method="post">
        @csrf
        Phone <br>
        <input type="text" name="phone" placeholder="Enter Your Phone"class="mt-3" required ><br><br>
        Address <br>
        <textarea name="address" id="" placeholder="Enter your Address" cols="30" row="3" style="width=50%" class="mt-3" required></textarea><br><br>
        Payment Type: <br>
        <input type="radio" name="payment" id="" value="Cash On Delivery" class="mt-3" required>Cash On Delivery<br>
        <input type="radio" name="payment" id="" value="Mobile Banking" class="mt-3" required>Mobile Banking<br>
        <input type="radio" name="payment" id="" value="Visa Card" class="mt-3" required>Visa Card<br>
        <input type="submit" value="Confirm" class="btn btn-danger text-light mt-3">
        
    </form> 

</div>

 @endsection
