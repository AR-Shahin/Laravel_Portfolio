@extends('layouts.back_master')
@section('title','Programming')
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info d-inline">Programming Code</h4>
                    <a data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-success text-light" style="float: right" ><i class="fa fa-plus"></i> Add New Code</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>GitHub Link</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="programmingTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function table_data_row(data) {
            var rows = '';
            var i = 0
            $.each(data ,function (key,value) {
                rows+= '<tr>';
                rows+= '<td>'+ ++i +'</td>';
                rows+= '<td>'+ value.title +'</td>';
                rows+= '<td>'+ value.link +'</td>';
                rows = rows + '<td class="text-center">';
                if(value.type == 1){
                    rows = rows + ' <button class="badge badge-success">DS and Algorithm</button>';
                }else{
                    rows = rows + ' <button class="badge badge-success">Others</button>';
                }
                rows+= '</td>';
                rows+= '<td data-id="'+value.id+'" class="text-center">';
                rows+= '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows+= '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows+= '</td>';
                rows+= '</tr>';
            });

            $('#programmingTable').html(rows);
            $('#dataTable').dataTable();
        }
        getAllProgrammingCode();
        function getAllProgrammingCode() {
            $.ajax({
                url : <?= json_encode(route('programming.fetch')) ?>,
                method : 'GET',
                data : {},
                success : function (response) {
                    //console.log(response.data)
                    table_data_row(response.data);
                }
            })
        }
//store
        $('#addProgrammingForm').on('submit',function (e) {
            e.preventDefault();
            var title = $('#title').val();
            var link = $('#link').val();
            var type = $('#type').val();

            if(title == ''){
                $('#title').addClass('is-invalid');
                setNotifyAlert('Field must not be empty','error');
                return;
            }else{
                $('#title').removeClass('is-invalid');
            }
            if(link == ''){
                $('#link').addClass('is-invalid');
                setNotifyAlert('Field must not be empty','error');
                return;
            }else{
                $('#link').removeClass('is-invalid');
            }
            if(type == ''){
                $('#type').addClass('is-invalid');
                setNotifyAlert('Field must not be empty','error');
                return;
            }else{
                $('#type').removeClass('is-invalid');
            }

            $.ajax({
                url : <?= json_encode(route('programming.store'))?>,
                method : 'POST',
                data : $('#addProgrammingForm').serialize(),
                success : function (response) {
                    if(response.flag == 'INSERT'){
                        setSwalAlert('success','Success!',response.message);
                        getAllProgrammingCode();
                        $('#addModal').modal('toggle');
                        $('#title').val('');
                        $('#type').val('');
                        $('#link').val('');
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
                    url : <?= json_encode(route('programming.destroy'))?>,
                    type : 'DELETE',
                    data : {id : id},
                    success : function (response) {
                        getAllProgrammingCode();
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
        });

        //Edit
        $('body').on('click','#editRow',function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : <?= json_encode(route('programming.edit'))?>,
                type : 'GET',
                data : {id : id},
                success : function (response) {
                   //console.log(response.data)
                    $('#e_id').val(response.data.id);
                    $('#e_title').val(response.data.title);
                    $('#e_link').val(response.data.link);
                    var html = '<option value="">Select A Type</option>';
                    if(response.data.type == 1){
                        html+= '<option value="1" selected>Data Structure and Algorithm</option>';
                        html+= '<option value="2">Others</option>';
                    }else{
                        html+= '<option value="1">Data Structure and Algorithm</option>';
                        html+= '<option value="2" selected>Others</option>';
                    }
                    $('#e_type').html(html);
                }
            })
        });

        //update
        $('#updateProgrammingForm').on('submit',function (e) {
            e.preventDefault();
            var type = $('#e_type').val();
            if(type == ''){
                $('#e_type').addClass('is-invalid');
                setNotifyAlert('Field must not be empty','error');
                return;
            }else{
                $('#e_type').removeClass('is-invalid');
            }
            $.ajax({
                url : <?= json_encode(route('programming.update'))?>,
                method:'PUT',
                data: $('#updateProgrammingForm').serialize(),
                success:function (response) {
                    if(response.flag == 'UPDATE') {
                        setSwalAlert('success', 'Good job!', response.message);
                        $('#editModal').modal('toggle');
                        getAllProgrammingCode();
                    }
                }
            });
        })

    </script>
@stop

<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Programming Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProgrammingForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Enter Project title" name="title">
                    </div>
                    <div class="form-group">
                        <input type="text" name="link" class="form-control" id="link" placeholder="Enter GitHub link">
                    </div>
                    <div class="form-group">
                        <select name="type" id="type" class="form-control">
                            <option value="">Select Program Type</option>
                            <option value="1">Data Structure and Algorithm</option>
                            <option value="2">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New Code</button>
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