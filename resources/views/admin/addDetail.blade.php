@extends('admin.layout')
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
<form action="{{route('saveDetail')}}" method="post" style="width:500px"class="m-auto mt-5" >
     @csrf
    <div class="mb-3">
         <label class="form-label">Color</label>
        <input type="text" class="form-control"  name="color" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="text" class="form-control"  name="stock_qty" required>
    </div>
    <div class="input-group d-flex mt-2 justify-content-center">
        <input type="submit" class=" btn btn-primary " value="Save">
         <input type="reset" class=" btn btn-danger ms-3" value="Cancel">
    </div>                                                                    
</form>
@endsection