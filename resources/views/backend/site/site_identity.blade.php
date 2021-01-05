@extends('layouts.back_master')
@section('title','Site-Identity')
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-info">Site Identity</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="20%">Logo</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><span id="phone"></span></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><span id="email"></span></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><span id="address"></span></td>
                        </tr>
                        <tr>
                            <th>Resume</th>
                            <td><span id="resume"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-info"><span id="siteHeader"></span></h3>
                </div>
                <div class="card-body">
                    <form action="">
                        <table class="table table-bordered">
                            <tr>
                                <th width="20%">Logo</th>
                                <td><input type="file" class="form-control " name="logo" id="input_logo"></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><input type="text" name="phone" class="form-control-sm form-control" placeholder="Enter Phone number" id="input_phone" value="@if($data != null) {{$data->phone}}@endif"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="email" name="email" class="form-control-sm form-control" placeholder="Enter Email" id="input_email"  value="@if($data != null) {{$data->email}}@endif"></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><input type="text" name="address" class="form-control-sm form-control" placeholder="Enter Address" id="input_address" value="@if($data != null) {{$data->address}}@endif"></td>
                            </tr>
                            <tr>
                                <th>Resume</th>
                                <td><input type="text" name="resume" class="form-control-sm form-control" placeholder="Enter Resume" id="input_resume" value="@if($data != null) {{$data->resume}}@endif"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-success btn-block" id="addSiteIdentityButton"><i class="fa fa-plus"></i> Add</button>
                                    <button class="btn btn-success btn-block" id="editSiteIdentityButton"><i class="fa fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var phone = $('#input_phone').val();
        var email = $('#input_email').val();
        var address = $('input_#address').val();
        var resume = $('#input_resume').val();
        if(phone == '' || email == '' || address == '' || resume == ''){
            $('#siteHeader').text('Add Site Identity');
            $('#editSiteIdentityButton').hide();
            $('#addSiteIdentityButton').show();
        }else{
            $('#siteHeader').text('Edit Site Identity');
            $('#editSiteIdentityButton').show();
            $('#addSiteIdentityButton').hide();
        }
//fetch
        getSiteIdentity();
        function getSiteIdentity() {
            $.ajax({
                url: <?= json_encode(route('site-identity.fetch'))?>,
                type:'GET',
                data: { },
                success: function (response) {
                   //  console.log(response.status);
                    $('#phone').text(response.data.phone);
                    $('#email').text(response.data.email);
                    $('#address').text(response.data.address);
                    $('#resume').text(response.data.resume);
                }
            });
        };

        //store
        $('#addSiteIdentityButton').on('click',function (e) {
            e.preventDefault();
            var logo = $('#input_logo').val();
            var phone = $('#input_phone').val();
            var email = $('#input_email').val();
            var address = $('#input_address').val();
            var resume = $('#input_resume').val();
            if(logo == ''){
                $('#input_logo').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#input_logo').removeClass('border-danger');
            }
            if(phone == ''){
                $('#input_phone').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#input_phone').removeClass('border-danger');
            }
            if(email == ''){
                $('#input_email').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#input_email').removeClass('border-danger');
            }
            if(address == ''){
                $('#input_address').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#input_address').removeClass('border-danger');
            }
            if(resume == ''){
                $('#input_resume').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#input_resume').removeClass('border-danger');
            }

            $.ajax({
                url : <?= json_encode(route('site-identity.store'))?>,
                method:'POST',
                data: {logo:logo,phone:phone,email:email,address:address,resume:resume},
                success:function (response) {
                    console.log(response.flag);
                    console.log(response);
                    if(response.flag =='EXT_NOT_MATCH'){
                        setSwalAlert('info','Warning!',response.message);
                    }
                }
            });
        })
    </script>
@stop