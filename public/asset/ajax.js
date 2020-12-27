$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getAllCategory();
    function getAllCategory() {
        var URL = base_url + '/get-category';
        $.ajax({
            url: root_url,
            type:'GET',
            data: { },
            success: function (data) {
                table_data_row(data);
            },
            error : function (e) {
                alert(e)
            }
        });
    }
    //Company table row
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
            rows = rows + '<a class="btn btn-sm btn-info text-light" id="editCategory" data-id="'+value.id+'" data-toggle="modal" data-target="#modal-id">Edit</a> ';
            rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteCategory" data-id="'+value.id+'" >Delete</a> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });

        $("#catTable").html(rows);
    }
    //status
    $('body').on('click', '#makeInactive', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var URL = 'http://localhost/Laravel/Laravel_Portfolio/public/admin/category/status-inactive';
        //var URL = "admin/category/status-inactive";
        $.ajax(
            {
                url: URL,
                type: 'GET',
                data: {
                    id: id
                },
                success: function (response) {
                    if (response == 'SUCCESS') {
                        getAllCategory();
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        return false;
    })

    $('body').on('click', '#makeActive', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var URL = 'http://localhost/Laravel/Laravel_Portfolio/public/admin/category/status-active';
       // var URL = 'admin/category/status-active';
        $.ajax(
            {
                url: URL,
                type: 'GET',
                data: {
                    id: id
                },
                success: function (response){
                    if(response == 'SUCCESS'){
                        getAllCategory();
                    }
                },
                error : function (e) {
                    console.log(e);
                }
            });
        return false;
    });
    //add category
    $('#catForm').on('submit',function (e) {
        e.preventDefault();
        var name = $("#cat_name").val();
        var  URL = 'http://localhost/Laravel/Laravel_Portfolio/public/admin/category/store';
        $.ajax({
            url : URL,
            method:'POST',
            data: {name : name },
            success:function (data) {
                if(data.message == 'EXIST'){
                    setSwalAlert('error','Sorry..','Category Already Exist!');
                }else if(data.flag == 'INSERT'){
                    setSwalAlert('success','Good job!',data.message);
                    getAllCategory();
                    $("#cat_name").val('');
                }
            },
            error : function (e) {
                console.log(e)
            }
        });
    })

    //delete
    $('body').on('click','#deleteCategory',function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var URL = 'http://localhost/Laravel/Laravel_Portfolio/public/admin/category/delete';
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
                url : URL,
                type : 'DELETE',
                data : {id : id},
                success : function (response) {
                    getAllCategory();
                    setSwalAlert('success','Good Job!',response.message);
                },
                error : function (e) {
                    console.log(e);
                }
            })
        }
    });
    })

    $('body').on('click','#editCategory',function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var URL = 'http://localhost/Laravel/Laravel_Portfolio/public/admin/category/edit';
            $.ajax({
                url : URL,
                type : 'GET',
                data : {id : id},
                success : function (response) {
                    $('#name').val(response.name);
                    $('#cat_id').val(response.id);
                },
                error : function (e) {
                    console.log(e);
                }
            })
    });
    //update category
    $('#catUpdateForm').on('submit',function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var id = $("#cat_id").val();
        $.ajax({
            url : 'http://localhost/Laravel/Laravel_Portfolio/public/admin/category/update',
            method:'POST',
            data: {name : name,id : id },
            success:function (data) {
                if(data.message == 'EXIST'){
                    setSwalAlert('error','Sorry..','Category Already Exist!');
                }else if(data.flag == 'UPDATE'){
                    setSwalAlert('success','Good job!',data.message);
                    getAllCategory();
                    $('#modal-id').modal('toggle');
                }
            },
            error : function (e) {
                console.log(e)
            }
        });
    })


});





function setSwalAlert(mode,title,text) {
    Swal.fire({
        icon: mode,
        title: title,
        text: text,
    })
}
