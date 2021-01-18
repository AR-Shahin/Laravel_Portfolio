@extends('layouts.back_master')
@section('title','Todo List')
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info d-inline">Manage Todo List</h4>
                    <a data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-success text-light" style="float: right" ><i class="fa fa-plus"></i> Todo List</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="todoTable">
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
    function table_data_row(data) {
        var rows = '';
        var i = 0
        //
        $.each(data ,function (key,value) {
            rows+= '<tr>';
            rows+= '<td>'+ ++i +'</td>';
            rows+= '<td>'+ value.title +'</td>';
            rows+= '<td>'+ value.admin.name +'</td>';
            rows+= '<td data-id="'+value.id+'" class="text-center">';
            rows+= '<a class="btn btn-sm btn-info text-light" id="viewRow" data-id="'+value.id+'" data-toggle="modal" data-target="#viewModal">View</a> ';

            rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id + '" >Delete</a> ';
            rows+= '</td>';
            rows+= '</tr>';
        });

        $('#todoTable').html(rows);
        $('#dataTable').dataTable();
    }
    //fetch admin
    function getAllToDo() {
        $.ajax({
            url : <?= json_encode(route('todo.fetch')) ?>,
            method : 'GET',
            data : {},
            success : function (response) {
                //console.log(response.data);
                table_data_row(response.data);
            }
        })
    }
    getAllToDo();
    $('#addToDoForm').validate({
        rules: {
            title: {
                required: true
            },
            text: {
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
    //store
    $(document).on('submit','#addToDoForm',function (e) {
        e.preventDefault();

        $.ajax({
            url : "{{route('todo.store')}}",
            method : 'POST',
            data : $(this).serialize(),
            success : function (response) {
                if(response.flag == 'INSERT'){
                    setSwalAlert('success', 'Good job!', response.message);
                    getAllToDo();
                    $('#addModal').modal('toggle');
                    $('#title').val('');
                    $('#text').val('');
                }
            }
        })
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
                url : <?= json_encode(route('todo.destroy'))?>,
                type : 'DELETE',
                data : {id : id},
                success : function (response) {
                    getAllToDo();
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
    $('body').on('click','#viewRow',function (e) {
        let id = $(this).attr('data-id');
        $.ajax({
            url : "{{route('todo.view')}}",
            method : 'GET',
            data : {id : id},
            success : function (response) {
                $('#V_title').text(response.data.title);
                $('#V_date').text(response.data.created_at);
                $('#V_text').text(response.data.text);

            }
        })
    });
</script>
@endpush

<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addToDoForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                    </div>

                   <div class="form-group">
                       <textarea name="text" id="text" cols="30" rows="5" class="form-control"></textarea>
                   </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal">View Mail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="25%">Title</th>
                        <td id="V_title"></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="V_date"></td>
                    </tr>
                    <tr>
                        <td colspan="2" id="V_text"></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>