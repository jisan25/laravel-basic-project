@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Portfolio</h4>

                        <form action="{{route('update.portfolio')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$data->id}}" name="id">
                        <div class="row mb-3">
                            <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="portfolio_name" type="text" placeholder="Enter Name" id="portfolio_name" value="{{$data->portfolio_name}}">
                                @error('portfolio_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="portfolio_title" type="text" placeholder="Enter portfolio_title" id="portfolio_title" value="{{$data->portfolio_title}}">
                                @error('portfolio_title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio Description</label>
                            <div class="col-sm-10">
                               <textarea id="elm1" name="portfolio_description" >{{$data->portfolio_description}}</textarea>
                            </div>
                        </div>

                     

                        <div class="row mb-3">
                            <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="portfolio_image" type="file" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="show_image" class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ url($data->portfolio_image) }}" alt="">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio">
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