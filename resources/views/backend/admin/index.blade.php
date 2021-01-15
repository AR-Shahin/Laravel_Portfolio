@extends('layouts.back_master')
@section('title','Admin')
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info d-inline">Manage Operator</h4>
                    <a data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-success text-light" style="float: right" ><i class="fa fa-plus"></i> Add New Operator</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="adminTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('script')
<script>
    $('#addOperatorForm').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            role: {
                required: true
            },
            phone: {
                required: true
            },
            image :{
                required: true
            },
            password :{
                required: true
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        }
    });

    $(document).on('submit','#addOperatorForm',function (e) {
        e.preventDefault();
        var data = new FormData(this);
        //console.log(data);
        $.ajax({
            url : "{{route('admin.store')}}",
            method : 'POST',
            data : data,
            cache:false,
            processData:false,
            contentType:false,
            success : function (response) {
                if(response.flag == 'EXT_NOT_MATCH'){
                    setSwalAlert('error',"Extension Doesn't match!",response.message);
                    $('#image').addClass('border-danger');
                }
                else if(response.flag == 'EMAIL_EXISTS'){
                    setSwalAlert('error',"Warning!",response.message);
                    $('#imageError').text(response.message);
                }
                else if(response.flag == 'BIG_SIZE'){
                    $('#image').addClass('border-danger');
                    setSwalAlert('error',"Warning!",response.message);
                    $('#imageError').text(response.message);
                }
                else if(response.flag == 'INSERT'){
                    setSwalAlert('success', 'Good job!', response.message);
                    //getGalleryPhoto();
                    $('#addModal').modal('toggle');
                    $('#name').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#role').val('');
                    $('#image').val('');
                    $('#phone').val('');

                }
            }

        })


    })
</script>
@endpush

<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addOperatorForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <select name="role" id="role" class="form-control">
                            <option value="">Select a Role </option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New Operator</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Edit  Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Programming Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateProgrammingForm">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="e_id" name="id">
                        <input type="text" name="title" class="form-control" id="e_title" >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="e_link" name="link">
                    </div>

                    <div class="form-group">
                        <select name="type" id="e_type" class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Update Programming Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>