@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Category</h4>

                        <form method="post" id="myForm" action="{{route('store.category')}}">
                            @csrf
                        <div class="row mb-3">
                            <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="category_name" type="text" placeholder="Enter Name" id="category_name">
                                
                            </div>
                        </div>       
                        
                        <div class="row mb-3">
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Category">

                        </div>

                  
                    </form>
                      
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                }, 
            },
            messages :{
                category_name: {
                    required : 'Please Enter Blog Category',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection