@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Page</h4>

                        <form action="{{route('update.about')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}" >
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Enter title" id="title" value="{{$data->title;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="short_title" type="text" placeholder="Enter short_title" id="short_title" value="{{$data->short_title;}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                               <textarea required="" name="short_description" class="form-control" rows="5">{{$data->short_description;}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="long_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                               <textarea id="elm1" name="long_description">{{$data->long_description;}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="about_image" type="file" id="about_image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="show_image" class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($data->about_image)) ? url($data->about_image):url('upload/no_image.jpg') }}" alt="">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page">

                        </div>

                  
                    </form>
                      
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#about_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result)
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>

@endsection