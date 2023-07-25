@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>

                        <form action="{{route('store.profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" placeholder="Enter Name" id="name" value="{{$data->name;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="username" type="text" placeholder="Enter Username" id="username" value="{{$data->username;}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" placeholder="Enter Email" id="email" value="{{$data->email;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Select Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="profile_image" type="file" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($data->profile_image)) ? url('upload/backend/'.$data->profile_image):url('upload/no_image.jpg') }}" alt="">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

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