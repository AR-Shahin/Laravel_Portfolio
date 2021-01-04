@extends('layouts.back_master')
@section('title','Category')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info">Category</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="catTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info">Add Category</h4>
                </div>
                <div class="card-body">
                    <form id="catAddForm">
                        <label for="">Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Category Name" id="add_cat_name">
                            <span class="text-danger">{{($errors->has('name')) ? ($errors->first('name')) : ' '}}</span>
                            <div id="response"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="catUpdateForm" >
                        <input type="hidden" id="cat_id" name="company_id" value="">
                        <div class="form-group">
                            <input type="text" id="name" name="name" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-block btn-info">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        //fetch
        getAllCategory();
        function getAllCategory () {
            $.ajax({
                url: <?= json_encode(route('category.fetch'))?>,
                type:'GET',
                data: { },
                success: function (response) {
                    table_data_row(response.data);
                }
            });
        };
        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {

                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>'+value.name+'</td>';
                rows = rows + '<td class="text-center">';
                if(value.status == 0){
                    rows = rows + ' <button class="badge badge-danger" data-id="'+value.id+'" id="makeActive">Inactive</button>';
                }else{
                    rows = rows + ' <button class="badge badge-success" data-id="'+value.id+'" id="makeInactive">Active</button>';
                }
                rows+= '</td>';
                rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#catTable").html(rows);
            $('#dataTable').dataTable();
        }
        //Store
        $('#catAddForm').on('submit',function (e) {
            e.preventDefault();
            var catName = $('#add_cat_name').val();
            if(catName == ''){
                $('#add_cat_name').addClass('border-danger');
                setNotifyAlert('Category field is required!','error');
                return;
            }else{
                $('#add_cat_name').removeClass('border-danger');
            }

            $.ajax({
                url : <?= json_encode(route('category.store'))?>,
                method : 'POST',
                data : {name : catName},
                success : function (response) {
                   if(response.flag == 'EXIST'){
                       $('#add_cat_name').addClass('border-danger');
                       setSwalAlert('info','Sorry!',response.message);
                   }else if(response.flag == 'INSERT'){
                       setSwalAlert('success','Success!',response.message);
                       getAllCategory();
                       $('#add_cat_name').removeClass('border-danger');
                       $('#add_cat_name').val('');
                   }
                }

            })
        });

    </script>
@stop

