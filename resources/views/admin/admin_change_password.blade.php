@extends('admin.admin_master')
@section('admin')



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password Page</h4><br><br>

                        @if(count($errors))
                        @foreach($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                        @endforeach
                        @endif

                        <form action="{{route('update.password')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row mb-3">
                            <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="oldpassword" type="password" placeholder="Enter Old Password" id="oldpassword" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="newpassword" type="password" placeholder="Enter New Password" id="newpassword" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="confirm_password" type="password" placeholder="Enter Confirm Password" id="confirm_password" value="">
                            </div>
                        </div>

                        

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">

                        </div>

                  
                    </form>
                      
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection