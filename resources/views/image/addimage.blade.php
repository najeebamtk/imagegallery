<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    .form-control.text-danger {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem) !important;
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
<div class="col-lg-8 blog-margin stretch-card pr-5">
    <div class="card mt-4 mb-4">
        <div class="card-body">
            <h4 class="card-title"><strong> Add Image</strong></h4><br>
           
    <form action="{{url('admin/addimage')}}" method="post" id="postform" style="text-align:center;" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                    <label for="exampleFormControlFile1"><strong> Image Upload</strong></label>
                    <input type="file" class="form-control-file" id="image1" name="image1" >
                </div>
                        <br><br>
                    
               
                        <div class="form-group">
                        <label for="exampleFormControlFile1"> <strong>Choose Category </strong></label>
                        <select class="custom-select form-control" name="category" >

                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
</select>
    
                   
                </div>

                <br><br>
                        <button type="submit" class=" btn-lg" style="background-color:aqua;">Add Image</button>
                    </form>
                    @if(isset($message))
        <p>{{$message}}</p>@endif
                    </div>
                    </div>
                </div>
            </div>
    </div>
</body></html>