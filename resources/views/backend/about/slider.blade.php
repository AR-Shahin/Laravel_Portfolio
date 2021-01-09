@extends('layouts.back_master')
@section('title','About Slider')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info">About Slider</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="aboutSliderTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info">Add New Slider</h4>
                </div>
                <div class="card-body">
                    <form id="sliderAddForm" enctype="multipart/form-data">
                        <label for="">Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Slider Title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image"  id="image">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Add Slider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal">Edit Slider</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="aboutSliderUpdateForm" enctype="multipart/form-data" method="post" action="{{route('about-slider.update')}}">
                        @csrf
                        <input type="hidden" id="id" name="id" value="">
                        <div class="form-group">
                            <input type="text" id="e_title" name="title" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file"  name="image"  class="form-control" id="e_image">
                            <input type="hidden" name="old_img" id="old_img">
                        </div>
                        <div class="form-group">
                           <span id="sliderEditImage"></span>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-block btn-info">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@stop

@push('script')
<script>
    $('#sliderAddForm').validate({
        rules: {
            title: {
                required: true
            },
            image :{
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
            rows+= '<td> <img src="../'+value.image+'" alt="" width="100px"></td>';
            rows+= '<td class="text-center">';
            if(value.status == 0){
                rows+= ' <button class="badge badge-danger" data-id="'+value.id+'" id="makeActive">Inactive</button>';
            }else{
                rows+= ' <button class="badge badge-success" data-id="'+value.id+'" id="makeInactive">Active</button>';
            }
            rows+= '</td>';
            rows+= '<td data-id="'+value.id+'" class="text-center">';
            rows+= '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';

                rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id + '" >Delete</a> ';
            rows+= '</td>';
            rows+= '</tr>';
        });

        $('#aboutSliderTable').html(rows);
        $('#dataTable').dataTable();
    }
    function getAboutSliderData(){
        $.ajax({
            url : <?= json_encode(route('about-slider.fetch')) ?>,
            method : 'GET',
            data : {},
            success : function (response) {
                table_data_row(response.data);
            }
        })
    }
    getAboutSliderData();
    $('#sliderAddForm').on('submit',function (e) {
        e.preventDefault();
        var title = $('#title').val();
        var image = $('#image').val();
        if(title == "" || image == ""){
            setNotifyAlert('Field must not be empty!','error');
            return false;
        }else{
            var data = new FormData(this);

            $.ajax({
                url : <?= json_encode(route('about-slider.store'))?>,
                method : 'POST',
                data : data,
                cache:false,
                processData:false,
                contentType:false,
                success : function (response) {
                    //console.log(response);
                    if(response.flag == 'EXT_NOT_MATCH'){
                        setSwalAlert('error',"Extension Doesn't match!",response.message);
                        $('#image').addClass('border-danger');
                    }else if(response.flag == 'EMAIL_NOT_MATCH'){
                        $('#email').addClass('border-danger');
                        $('#emailError').text(response.message);
                    }
                    else if(response.flag == 'BIG_SIZE'){
                        $('#image').addClass('border-danger');
                        $('#imageError').text(response.message);
                    }
                    else if(response.flag == 'INSERT'){
                        setSwalAlert('success', 'Good job!', response.message);
                        getAboutSliderData();
                        $('#title').val('');
                        $('#image').val('');
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
                url: <?= json_encode(route('about-slider.status.active'))?>,
                type: 'PUT',
                data: {
                    id: id
                },
                success: function (response){
                    if(response.flag == 'ACTIVE'){
                        setNotifyAlert('Status Active Successfully!','success');
                        getAboutSliderData();
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
                url: <?= json_encode(route('about-slider.status.inactive'))?>,
                type: 'PUT',
                data: {
                    id: id
                },
                success: function (response){
                    if(response.flag == 'INACTIVE'){
                        setNotifyAlert('Status Inactive Successfully!','success');
                        getAboutSliderData();
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
                url : <?= json_encode(route('about-slider.destroy'))?>,
                type : 'DELETE',
                data : {id : id},
                success : function (response) {
                    getAboutSliderData();
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
    //Edit
    $('body').on('click','#editRow',function (e) {
        e.preventDefault();
        $("#e_image").val('');
//        $('#e_title').removeClass('border-danger');
        var id = $(this).attr('data-id');
        $.ajax({
            url : <?= json_encode(route('about-slider.edit'))?>,
            type : 'GET',
            data : {id : id},
            success : function (response) {
               // console.log(response.data);
                var html = '<img src="../'+response.data.image +'" alt="" width="100px">';
                $('#id').val(response.data.id);
               $('#e_title').val(response.data.title);
               $('#old_img').val(response.data.image);
               $('#sliderEditImage').html(html);
            }
        })
    })
    //update
    $('#aboutSliderUpdateForm').on('submit',function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url : <?= json_encode(route('about-slider.update'))?>,
            method:'POST',
            data: data,
            cache:false,
            processData:false,
            contentType:false,
            success:function (response) {
                if(response.flag == 'EXT_NOT_MATCH'){
                    setSwalAlert('error',"Extension Doesn't match!",response.message);
                }
                else if(response.flag == 'BIG_SIZE'){
                    $('#imageError').text(response.message);
                }
                else if(response.flag == 'UPDATE'){
                    setSwalAlert('success', 'Good job!', response.message);
                    getAboutSliderData();
                    $('#editModal').modal('toggle');
                }
            }
        });
    })

</script>
@endpush


