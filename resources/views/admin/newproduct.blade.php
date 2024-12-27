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
        <?php
                $images="";
        ?>
        <form action="{{route('saveProduct')}}" method="post" style="width:500px"class="m-auto mt-5" enctype="multipart/form-data" >
                @csrf
                        <div class="mb-3 ">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control"  name="category" required>
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" class="form-control"  name="brand" required>
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Color</label>
                                <input type="text" class="form-control"  name="color"required >
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control"  name="price" required>
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="text" class="form-control"  name="stock_qty" required>
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Image</label>                               
                                <img src="" alt="" id="imgPreview" style="width:100px; heigth:100px">
                        </div>
        

                        <div class="mb-3 d-flex">
                                <input type="file" class="form-control"  name="img_name" id="imgInput" required>
                                <!-- <input type="submit" value="Upload"class="btn btn-warning ms-2" required> -->
                        </div>
                        

                                <div class="input-group d-flex mt-2 justify-content-center">
                                        <input type="submit" class=" btn btn-primary " value="Save">
                                        <input type="reset" class=" btn btn-danger ms-3" value="Cancel">
                                        <a href="{{route('newColor')}}" class="btn btn-success ms-3">Add New Color</a>
                                </div>                                                                    
        </form>
        <script>
                                        document.getElementById('imgInput').addEventListener('change', function(event) {
                                        const [file] = event.target.files;
                                        if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                                const imgPreview = document.getElementById('imgPreview');
                                                imgPreview.src = e.target.result;
                                                imgPreview.style.display = 'block';
                                        }
                                        reader.readAsDataURL(file);
                                        }
                                        });
                                        
         </script>
@endsection