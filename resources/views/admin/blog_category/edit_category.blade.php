@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Category</h4>

                        <form action="{{route('update.category')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row mb-3">
                            <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="category_name" type="text" placeholder="Enter Name" id="category_name" value="{{ $data->category_name }}">
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>       
                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Category">

                        </div>

                  
                    </form>
                      
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection