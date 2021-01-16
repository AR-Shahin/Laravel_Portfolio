@extends('layouts.back_master')
@section('title','Contact')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info">Manage Contact Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="contactTable">
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
        var	rows = '';
        var i = 0;
        $.each( data, function( key, value ) {

            rows = rows + '<tr>';
            rows = rows + '<td>'+ ++i +'</td>';
            rows = rows + '<td>'+value.name+'</td>';
            rows = rows + '<td>'+value.email+'</td>';
            rows = rows + '<td>'+value.subject+'</td>';
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
        $("#contactTable").html(rows);
        $('#dataTable').dataTable();
    }
    function getAllContactInformation() {
        $.ajax({
            url: <?= json_encode(route('contact.fetch'))?>,
            type:'GET',
            data: { },
            success: function (response) {
                table_data_row(response.data);
                $('#dataTable').dataTable();
            }
        });
    }
    getAllContactInformation();
</script>
@endpush