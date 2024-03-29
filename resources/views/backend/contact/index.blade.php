@extends('layouts.back_master')
@section('title','Contact')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="text-info d-inline">Manage Contact Information</h4>
                    <div class="d-flex" id="bulk_options">
                        <form class="form-inline" id="bulkForm">
                            <div class="form-group mb-2">
                                <select name="bulk_option" id="bulk_option" class="form-control">
                                    <option value="">Bulk Options</option>
                                    <option value="seen">Seen</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th width="" class="d-flex"><input type="checkbox" id="allIdSelect" class="form-control-sm"></th>
                                <th width="1%">SL</th>
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
            rows += '<td width="2%"><input type="checkbox" id="checkBoxItem" class="form-control-sm checkBoxItem" name="ids" value="'+value.id+'"></td>'
            rows = rows + '<td>'+ ++i +'</td>';
            rows = rows + '<td>'+value.name+'</td>';
            rows = rows + '<td>'+value.email+'</td>';
            rows = rows + '<td>'+value.subject+'</td>';
            rows = rows + '<td class="text-center">';
            if(value.status == 0){
                rows = rows + ' <button class="badge badge-danger" data-id="'+value.id+'" id="makeSeen">New</button>';
            }else{
                rows = rows + ' <button class="badge badge-success" data-id="'+value.id+'" id="makeInactive">Seen</button>';
            }
            rows+= '</td>';
            rows = rows + '<td data-id="'+value.id+'" class="text-center">';
            rows = rows + '<a class="btn btn-sm btn-info text-light" id="viewRow" data-id="'+value.id+'" data-toggle="modal" data-target="#viewModal">View</a> ';
            rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });
        $("#contactTable").html(rows);
        $('#dataTable').dataTable();
    }
    function getAllContactInformation() {
        console.log('i am from getallInfo');
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

    //Delete

    $('body').on('click','#deleteRow',function (e) {
        e.preventDefault();
        let id = []
         id[0] = $(this).attr('data-id');

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
                url : <?= json_encode(route('contact.destroy'))?>,
                type : 'DELETE',
                data : {id : id},
                success : function (response) {
                    getAllContactInformation();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your data has been deleted.',
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
    //seen
    $('body').on('click', '#makeSeen', function (event) {
        event.preventDefault();
        let id = []
        id[0] = $(this).attr('data-id');

        $.ajax(
            {
                url: <?= json_encode(route('contact.seen'))?>,
                type: 'PUT',
                data: {
                    id: id
                },
                success: function (response){
                    if(response.flag == 'SEEN'){
                        setNotifyAlert('Mail has seen Successfully!','success');
                        getAllContactInformation();
                    }
                }
            });

    });

    //view

    $('body').on('click','#viewRow',function (e) {
       let id = $(this).attr('data-id');
       $.ajax({
           url : "{{route('contact.view')}}",
           method : 'GET',
           data : {id : id},
           success : function (response) {
               $('#V_name').text(response.data.name);
               $('#V_email').text(response.data.email);
               $('#V_subject').text(response.data.subject);
               if(response.data.status === 0){
                   $('#V_status').html('<span class="badge badge-warning">Unseen</span>');
               }else{
                   $('#V_status').html('<span class="badge badge-success">Seen</span>');
               }
               $('#V_date').text(response.data.created_at);
               $('#V_text').text(response.data.text);

           }
       })
    });
    //Check box
    $('body').on('click','#allIdSelect',function(e){
        $('.checkBoxItem').prop('checked',$(this).prop('checked'));
    });
    //bulk form
    $('body').on('submit','#bulkForm',function(e){
        e.preventDefault();
        let ids = [];
        $('input:checkbox[name=ids]:checked').each(function(){
            ids.push($(this).val());
        })

        let bulk_option = $('#bulk_option').val()
        if(bulk_option === ''){
            alert('Select Bluck Option!');
            return;
        }else if(ids.length == 0){
            alert('Select Any  Row!');
            return;
        }
        else if(bulk_option === 'seen'){
            $.ajax(
            {
                url: <?= json_encode(route('contact.seen'))?>,
                type: 'PUT',
                data: {
                    id: ids
                },
                success: function (response){
                    if(response.flag == 'SEEN'){
                        setNotifyAlert('Mail has seen Successfully!','success');
                        getAllContactInformation();
                        $('#allIdSelect').prop('checked',false)
                    }
                }
            });

        }else if(bulk_option === 'delete'){
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
                url : <?= json_encode(route('contact.destroy'))?>,
                type : 'DELETE',
                data : {id : ids},
                success : function (response) {
                    getAllContactInformation();
                    if($('#allIdSelect').prop('checked',$(this).prop('checked'))){
                        getAllContactInformation();
                        $('#allIdSelect').prop('checked', false)
                        }
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your data has been deleted.',
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
        }

    })


</script>
@endpush

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
                   <th width="25%">Name</th>
                   <td id="V_name"></td>
               </tr>
               <tr>
                   <th>Email</th>
                   <td id="V_email"></td>
               </tr>
               <tr>
                   <th>Subject</th>
                   <td id="V_subject"></td>
               </tr>
               <tr>
                   <th>Status</th>
                   <td id="V_status"></td>
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
