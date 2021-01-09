@extends('layouts.back_master')
@section('title','Project')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-info d-inline">Manage Project</h3>
                    <button class="btn btn-info btn-sm" style="float: right;" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Project</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th width="1%">SL</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="projectTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="addProjectForm" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id">Category : </label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select a Category</option>
                                @forelse($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @empty
                                    <option value="">Not Found Anything</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title : </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">Image : </label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text">Thumbnail Image : </label>
                                    <input type="file" class="form-control" id="thumb_image" name="thumb_image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Youtube Link : </label>
                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube Link">
                        </div>
                        <div class="form-group">
                            <label for="github">GitHub Link : </label>
                            <input type="text" class="form-control" id="github" name="github" placeholder="GitHub Link ">
                        </div>
                        <div class="form-group">
                            <label for="live">Live Link : </label>
                            <input type="text" class="form-control" id="live" name="live" placeholder="Live Link ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--view modal--}}
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="20%">Title</th>
                            <td><span id="viewTitle"></span></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td><span id="viewCategory"></span></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><span id="viewImage"></span></td>
                        </tr>
                        <tr>
                            <th>Thumbnail Image</th>
                            <td><span id="viewThumbImage"></span></td>
                        </tr>
                        <tr>
                            <th>Youtube</th>
                            <td><span id="viewYoutube"></span></td>
                        </tr>
                        <tr>
                            <th>GitHub</th>
                            <td><span id="viewGit"></span></td>
                        </tr>
                        <tr>
                            <th>Live</th>
                            <td><span id="viewLive"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="editProjectForm" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id">Category : </label>
                            <select name="category_id" id="e_category_id" class="form-control">
                                <option value="">Select a Category</option>
                                @forelse($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @empty
                                    <option value="">Not Found Anything</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title : </label>
                            <input type="text" class="form-control" id="e_title" name="title" placeholder="Title">
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">Image : </label>
                                    <input type="file" class="form-control" id="e_image" name="image">
                                    <span id="editImage"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text">Thumbnail Image : </label>
                                    <input type="file" class="form-control" id="e_thumb_image" name="thumb_image">
                                    <span id="editThumbImage"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Youtube Link : </label>
                            <input type="text" class="form-control" id="e_youtube" name="youtube" placeholder="Youtube Link">
                        </div>
                        <div class="form-group">
                            <label for="github">GitHub Link : </label>
                            <input type="text" class="form-control" id="e_github" name="github" placeholder="GitHub Link ">
                        </div>
                        <div class="form-group">
                            <label for="live">Live Link : </label>
                            <input type="text" class="form-control" id="e_live" name="live" placeholder="Live Link ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $('#addProjectForm').validate({
        rules: {
            category_id: {
                required: true
            },
            title: {
                required: true
            },
            image :{
                required: true
            }
            ,
            thumb_image :{
                required: true
            }
            ,
            youtube :{
                required: true
            }
            ,
            github :{
                required: true
            }
            ,
            live :{
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
    $('#editProjectForm').validate({
        rules: {
            category_id: {
                required: true
            },
            title: {
                required: true
            },
            youtube :{
                required: true
            }
            ,
            github :{
                required: true
            }
            ,
            live :{
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
</script>

<script>
    function table_data_row(data) {
        var rows = '';
        var i = 0
        //
        $.each(data ,function (key,value) {
            rows+= '<tr>';
            rows+= '<td>'+ ++i +'</td>';
            rows+= '<td>'+ value.title +'</td>';
            rows+= '<td>'+ value.category.name +'</td>';
            rows+= '<td> <img src="../'+value.image+'" alt="" width="100px"></td>';
            rows+= '<td class="text-center">';
            if(value.status == 0){
                rows+= ' <button class="badge badge-danger" data-id="'+value.id+'" id="makeActive">Inactive</button>';
            }else{
                rows+= ' <button class="badge badge-success" data-id="'+value.id+'" id="makeInactive">Active</button>';
            }
            rows+= '</td>';
            rows+= '<td data-id="'+value.id+'" class="text-center">';
            rows+= '<a class="btn btn-sm btn-primary text-light" id="viewRow" data-id="'+value.id+'" data-toggle="modal" data-target="#viewModal">View</a> ';
            rows+= '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';

            rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id + '" >Delete</a> ';
            rows+= '</td>';
            rows+= '</tr>';
        });

        $('#projectTable').html(rows);
        $('#dataTable').dataTable();
    }
    //fetch projects
    getAllProjects();
    function getAllProjects() {
        $.ajax({
            url : <?= json_encode(route('project.fetch')) ?>,
            method : 'GET',
            data : {},
            success : function (response) {
                // console.log(response.data)
                table_data_row(response.data);
            }
        })
    }
    //store
    $('#addProjectForm').on('submit',function (e) {
        e.preventDefault();
        var cat = $('#category_id').val();
        var title = $('#title').val();
        var image = $('#image').val();
        var thumb_image = $('#thumb_image').val();
        var youtube = $('#youtube').val();
        var github = $('#github').val();
        var live = $('#live').val();
        if(title == "" || image == "" || cat == "" || thumb_image == "" || youtube == "" || github == "" || live == ""){
            setNotifyAlert('Field must not be empty!','error');
            return false;
        }else{
            var data = new FormData(this);
            $.ajax({
                url : "{{route('project.store')}}",
                method : 'POST',
                data : data,
                cache:false,
                processData:false,
                contentType:false,
                success : function (response) {
                    //console.log(response);
                    if(response.flag == 'IMAGE_EXT_NOT_MATCH'){
                        $('#image').addClass('border-danger');
                        setSwalAlert('error',"Extension Doesn't match!",response.message);
                    }else  if(response.flag == 'THUMB_EXT_NOT_MATCH'){
                        $('#thumb_image').addClass('border-danger');
                        setSwalAlert('error',"Extension Doesn't match!",response.message);
                    }
                    else if(response.flag == 'INSERT'){
                        setSwalAlert('success', 'Good job!', response.message);
                        getAllProjects();
                        $('#addModal').modal('toggle');
                        $('#title').val('');
                        $('#image').val('');
                        $('#category_id').val('');
                        $('#thumb_image').val('');
                        $('#youtube').val('');
                        $('#github').val('');
                        $('#live').val('');
                    }
                }
            })
        }
    });
    //Status Active
    $('body').on('click', '#makeActive', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax(
            {
                url: <?= json_encode(route('project.status.active'))?>,
                type: 'PUT',
                data: {
                    id: id
                },
                success: function (response){
                    if(response.flag == 'ACTIVE'){
                        setNotifyAlert('Status Active Successfully!','success');
                        getAllProjects();
                    }
                }
            });
    });

    //Inactive
    $('body').on('click', '#makeInactive', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax(
            {
                url: <?= json_encode(route('project.status.inactive'))?>,
                type: 'PUT',
                data: {
                    id: id
                },
                success: function (response){
                    if(response.flag == 'INACTIVE'){
                        setNotifyAlert('Status Inactive Successfully!','success');
                        getAllProjects();
                    }
                }
            });
    });
    //Delete
    $('body').on('click','#deleteRow',function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
                url : <?= json_encode(route('project.destroy'))?>,
                type : 'DELETE',
                data : {id : id},
                success : function (response) {
                    getAllProjects();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        response.message,
                        'success'
                    )
                },
                error : function (e) {
                    console.log(e);
                }
            })

        } else if (
                /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your file is safe :)',
                'error'
            )
        }
    })
    })

    //view
    $('body').on('click','#viewRow',function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url : "{{route('project.view')}}",
            method : 'GET',
            data : {id:id},
            success: function (response) {
               // console.log(response.data)
                $('#viewTitle').text(response.data.title);
                $('#viewCategory').text(response.data.category.name);
                $('#viewImage').html('<img src="../'+ response.data.image +'" alt="" width="100px">');
                $('#viewThumbImage').html('<img src="../'+ response.data.thumb_image +'" alt="" width="100px">');
                $('#viewYoutube').text(response.data.youtube);
                $('#viewGit').text(response.data.github);
                $('#viewLive').text(response.data.live);
            }
        })
    })

    //edit
    $('body').on('click','#editRow',function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url : "{{route('project.edit')}}",
            method : 'GET',
            data : {id:id},
            success: function (response) {
                // console.log(response.data)
                $('#e_title').val(response.data.title);
                $('#e_category_id').val(response.data.category.id);
                $('#editImage').html('<img src="../'+ response.data.image +'" alt="" width="100px">');
                $('#editThumbImage').html('<img src="../'+ response.data.thumb_image +'" alt="" width="100px">');
                $('#e_youtube').val(response.data.youtube);
                $('#e_github').val(response.data.github);
                $('#e_live').val(response.data.live);
            }
        })
    })

    //update
    $('#editProjectForm').on('submit',function (e) {
        e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                url : "{{route('project.update')}}",
                method : 'POST',
                data : data,
                cache:false,
                processData:false,
                contentType:false,
                success : function (response) {
                    //console.log(response);
                    if(response.flag == 'IMAGE_EXT_NOT_MATCH'){
                        $('#image').addClass('border-danger');
                        setSwalAlert('error',"Extension Doesn't match!",response.message);
                    }else  if(response.flag == 'THUMB_EXT_NOT_MATCH'){
                        $('#thumb_image').addClass('border-danger');
                        setSwalAlert('error',"Extension Doesn't match!",response.message);
                    }
                    else if(response.flag == 'INSERT'){
                        setSwalAlert('success', 'Good job!', response.message);
                        getAllProjects();
                        $('#addModal').modal('toggle');
                        $('#title').val('');
                        $('#image').val('');
                        $('#category_id').val('');
                        $('#thumb_image').val('');
                        $('#youtube').val('');
                        $('#github').val('');
                        $('#live').val('');
                    }
                }
            })
    });

</script>

@endpush