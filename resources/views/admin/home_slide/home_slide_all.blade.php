@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide Page</h4>

                        <form action="{{route('update.slider')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$homeslide->id}}" >
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Enter title" id="title" value="{{$homeslide->title;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="short_title" type="text" placeholder="Enter short_title" id="short_title" value="{{$homeslide->short_title;}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="video_url" type="video_url" placeholder="Enter video_url" id="video_url" value="{{$homeslide->video_url;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="home_slide" type="file" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Home Slide Image</label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide)) ? url($homeslide->home_slide):url('upload/no_image.jpg') }}" alt="">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">

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
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result)
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>

@endsection