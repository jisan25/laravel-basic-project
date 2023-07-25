@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Multi Image</h4> <br><br>

                        <form action="{{route('update.multi.image')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}" >
                      

                        <div class="row mb-3">
                            <label for="about_image" class="col-sm-2 col-form-label">About Multi Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="multi_image" type="file" id="about_image" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="show_image" class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{url($data->multi_image);}}" alt="">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Multi Image">

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