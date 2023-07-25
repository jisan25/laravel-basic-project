@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Blog</h4>

                        <form action="{{route('store.blog')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row mb-3">
                            <label for="blog_category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Select Category</option>
                                    @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="blog_title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="blog_title" type="text" placeholder="Enter blog_title" id="blog_title" >
                                @error('blog_title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="blog_description" class="col-sm-2 col-form-label">Blog Description</label>
                            <div class="col-sm-10">
                               <textarea id="elm1" name="blog_description" ></textarea>
                               @error('blog_description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="row mb-3">
                            <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="blog_image" type="file" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="show_image" class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="blog_tags" class="col-sm-2 col-form-label">Tags</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="blog_tags" type="text" placeholder="Enter blog_tags" id="blog_tags" value="home,tech" data-role="tagsinput">
                                @error('blog_tags')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Submit">
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