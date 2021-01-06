@extends('layouts.back_master')
@section('title','Social Links')
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-info">Social Links</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="20%">Facebook</th>
                            <td><span id="facebook"></span></td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td><span id="twitter"></span></td>
                        </tr>
                        <tr>
                            <th>Github</th>
                            <td><span id="github"></span></td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td><span id="instagram"></span></td>
                        </tr>
                        <tr>
                            <th>Youtube</th>
                            <td><span id="youtube"></span></td>
                        </tr>
                        <tr>
                            <th>Linkedin</th>
                            <td><span id="linkedin"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 id="socialLinkHeader"></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Facebook</td>
                            <td><input type="text" class="form-control form-control-sm" id="in_facebook" name="facebook" placeholder="Facebook account's link" value="@if($data) {{$data->facebook}} @endif"></td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td><input type="text" class="form-control form-control-sm" id="in_twitter" name="twitter" placeholder="Twitter account's link" value="@if($data) {{$data->twitter}} @endif"></td>
                        </tr>
                        <tr>
                            <td>Github</td>
                            <td><input type="text" class="form-control form-control-sm" id="in_github" name="github" placeholder="Github account's link" value="@if($data) {{$data->github}} @endif"></td>
                        </tr>
                        <tr>
                            <td>Youtube</td>
                            <td><input type="text" class="form-control form-control-sm" id="in_youtube" name="youtube" placeholder="Youtube account's link" value="@if($data) {{$data->youtube}} @endif"></td>
                        </tr>
                        <input type="hidden" name="id" id="id" value="@if($data != null) {{$data->id}}@endif">
                        <tr>
                            <td>Instagram</td>
                            <td><input type="text" class="form-control form-control-sm" id="in_instagram" name="instagram" placeholder="Instagram account's link" value="@if($data) {{$data->instagram}} @endif"></td>
                        </tr>
                        <tr>
                            <td>Linkedin</td>
                            <td><input type="text" class="form-control form-control-sm" id="in_linkedin" name="linkedin" placeholder="Linkedin account's link" value="@if($data) {{$data->linkedin}} @endif"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-block btn-success" id="addSocialLinksButton">Add</button>
                                <button class="btn btn-block btn-info" id="updateSocialLinksButton">Update</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        getSocialLinks();
        function getSocialLinks() {
            $.ajax({
                url: <?= json_encode(route('social-link.fetch'))?>,
                type:'GET',
                data: { },
                success: function (response) {
                    $('#facebook').text(response.data.facebook);
                    $('#twitter').text(response.data.twitter);
                    $('#instagram').text(response.data.instagram);
                    $('#linkedin').text(response.data.linkedin);
                    $('#github').text(response.data.github);
                    $('#youtube').text(response.data.youtube);
                }
            });
        };

        $('#addSocialLinksButton').hide();
        $('#updateSocialLinksButton').hide();
        var facebook = $('#in_facebook').val();
        var twitter = $('#in_twitter').val();
        var github = $('#in_github').val();
        var youtube = $('#in_youtube').val();
        var linkedin = $('#in_linkedin').val();
        var instagram = $('#in_instagram').val();

        if(facebook == '' || twitter == '' || github == '' || youtube == '' || linkedin == '' || instagram == ''){
            $('#socialLinkHeader').text('Add Social Links');
            $('#addSocialLinksButton').show();
        }else{
            $('#socialLinkHeader').text('Edit Social Links');
            $('#updateSocialLinksButton').show();
        }

        //store
        $('#addSocialLinksButton').on('click',function () {
            var facebook = $('#in_facebook').val();
            var twitter = $('#in_twitter').val();
            var github = $('#in_github').val();
            var youtube = $('#in_youtube').val();
            var linkedin = $('#in_linkedin').val();
            var instagram = $('#in_instagram').val();

            if(facebook == ''){
                $('#in_facebook').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_facebook').removeClass('border-danger');
            }
            if(twitter == ''){
                $('#in_twitter').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_twitter').removeClass('border-danger');
            }
            if(github == ''){
                $('#in_github').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_github').removeClass('border-danger');
            }
            if(youtube == ''){
                $('#in_youtube').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_youtube').removeClass('border-danger');
            }
            if(instagram == ''){
                $('#in_instagram').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_instagram').removeClass('border-danger');
            }
            if(linkedin == ''){
                $('#in_linkedin').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_linkedin').removeClass('border-danger');
            }

            var data ={
                facebook:facebook,twitter:twitter,github:github,linkedin:linkedin,instagram:instagram,youtube:youtube
            }
            $.ajax({
                url : <?= json_encode(route('social-link.store'))?>,
                method:'POST',
                data: data,
                success:function (response) {
                    //console.log(response);
                    if(response.flag == 'INSERT'){
                        setSwalAlert('success','Success!',response.message);
                        $('#facebook').text(facebook);
                        $('#twitter').text(twitter);
                        $('#instagram').text(instagram);
                        $('#linkedin').text(linkedin);
                        $('#github').text(github);
                        $('#youtube').text(youtube);
                        $('#updateSocialLinksButton').show();
                        $('#addSocialLinksButton').hide();
                        $('#id').val(response.data);
                    }
                }
            });
        });

        //update
        $('#updateSocialLinksButton').on('click',function () {
            var facebook = $('#in_facebook').val();
            var twitter = $('#in_twitter').val();
            var github = $('#in_github').val();
            var youtube = $('#in_youtube').val();
            var linkedin = $('#in_linkedin').val();
            var instagram = $('#in_instagram').val();

            if(facebook == ''){
                $('#in_facebook').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_facebook').removeClass('border-danger');
            }
            if(twitter == ''){
                $('#in_twitter').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_twitter').removeClass('border-danger');
            }
            if(github == ''){
                $('#in_github').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_github').removeClass('border-danger');
            }
            if(youtube == ''){
                $('#in_youtube').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_youtube').removeClass('border-danger');
            }
            if(instagram == ''){
                $('#in_instagram').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_instagram').removeClass('border-danger');
            }
            if(linkedin == ''){
                $('#in_linkedin').addClass('border-danger');
                setNotifyAlert('Field must not be empty!');
                return;
            }else{
                $('#in_linkedin').removeClass('border-danger');
            }
            var id = $('#id').val();
            var data ={
                facebook:facebook,twitter:twitter,github:github,linkedin:linkedin,instagram:instagram,youtube:youtube,id:id
            }
            $.ajax({
                url : <?= json_encode(route('social-link.update'))?>,
                method:'PUT',
                data: data,
                success:function (response) {
                    //console.log(response);
                    if(response.flag == 'UPDATED'){
                        setSwalAlert('success','Success!',response.message);
                        $('#in_facebook').val(facebook);
                        $('#in_twitter').val(twitter);
                        $('#in_github').val(github);
                        $('#in_instagram').val(instagram);
                        $('#in_youtube').val(youtube);
                        $('#in_linkedin').val(linkedin);
                        getSocialLinks();
                    }
                }
            });
        });

    </script>
@stop