@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer Page</h4>

                        <form action="{{route('update.footer')}}" method="POST" >
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}" >
                        <div class="row mb-3">
                            <label for="number" class="col-sm-2 col-form-label">Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="number" type="text" placeholder="Enter number" id="number" value="{{$data->number;}}">
                            </div>
                        </div>

                      
                        
                        <div class="row mb-3">
                            <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                               <textarea required="" name="short_description" class="form-control" rows="5">{{$data->short_description;}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" placeholder="Enter email" id="email" value="{{$data->email;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="facebook" type="facebook" placeholder="Enter facebook" id="facebook" value="{{$data->facebook;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="twitter" type="twitter" placeholder="Enter twitter" id="twitter" value="{{$data->twitter;}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="copyright" type="copyright" placeholder="Enter copyright" id="copyright" value="{{$data->copyright;}}">
                            </div>
                        </div>
                        

                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">

                        </div>

                  
                    </form>
                      
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection