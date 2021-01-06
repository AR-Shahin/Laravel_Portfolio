@extends('layouts.back_master')
@section('title','About Text')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-info">About Text</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Top Text</th>
                                <th>Bottom Text</th>
                            </tr>
                            </thead>
                            <tbody id="catTable">
                            <tr>
                                <td><span id="topText"></span></td>
                                <td><span id="bottomText"></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12 col-md-4" id="addAbtBlock">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-info"><span id="abtHeading"></span></h4>
                    </div>
                    <div class="card-body">
                        <form id="aboutTextAddForm">
                            <input type="hidden" name="id" id="id" value="@if($data != null) {{$data->id}}@endif">
                            <div class="form-group">
                                <label for="">Top Text</label>
                                <textarea name="top_text" id="top_text" cols="30" rows="5" class="form-control">@if($data != null) {{$data->top_text}}@endif</textarea>
                                <div id="response"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Bottom Text</label>
                                <textarea name="bottom_text" id="bottom_text" cols="30" rows="5" class="form-control">@if($data != null) {{$data->bottom_text}}@endif</textarea>
                                <div id="response"></div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-success" id="addTextButton"><i class="fa fa-plus"></i> Add Text</button>
                                <button class="btn btn-block btn-success" id="updateTextButton"><i class="fa fa-edit"></i> Update Text</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>



    <script>
        getAboutText();
        function getAboutText() {
            $.ajax({
                url: <?= json_encode(route('about-text.fetch'))?>,
                type:'GET',
                data: { },
                success: function (response) {
                   // console.log(response.status);
                    $('#topText').text(response.data.top_text);
                    $('#bottomText').text(response.data.bottom_text);
                }
            });
        };

        var topTxt = $('#top_text').val();
        var bottomTxt = $('#bottom_text').val();
        if(topTxt == '' || bottomTxt == ''){
            $('#updateTextButton').hide();
            $('#addTextButton').show();
            $('#abtHeading').text('Add About Text');
        }else{
            $('#abtHeading').text('Edit About Text');
            $('#updateTextButton').show();
            $('#addTextButton').hide();
        }

        $('#addTextButton').on('click',function (e) {
            e.preventDefault();
            var topTxt = $('#top_text').val();
            var bottomTxt = $('#bottom_text').val();

            if(topTxt == ''){
                $('#top_text').addClass('border-danger');
                setNotifyAlert('Field must not be empty!','error');
                return;
            }else{
                $('#top_text').removeClass('border-danger');
            }

            if(bottomTxt == ''){
                $('#bottom_text').addClass('border-danger');
                setNotifyAlert('Field must not be empty!','error');
                return;
            }else{
                $('#bottom_text').removeClass('border-danger');
            }
            $.ajax({
                url : <?= json_encode(route('about-text.store'))?>,
                method:'POST',
                data: {top_text : topTxt,bottom_text : bottomTxt },
                success:function (response) {
                    console.log(response.data);
                    if(response.flag =='WARNING'){
                        setSwalAlert('info','Warning!',response.message);
                    }
                    else if(response.flag == 'INSERT'){
                        setSwalAlert('success','Success!',response.message);
                        $('#top_text').val(topTxt);
                        $('#bottom_text').val(bottomTxt);
                        getAboutText();
                        $('#updateTextButton').show();
                        $('#addTextButton').hide();
                        $('#id').val(response.data);
                        $('#abtHeading').text('Edit About Text');
                    }
                }
            });
        })

        $('#updateTextButton').on('click',function (e) {
            e.preventDefault();
            var topTxt = $('#top_text').val();
            var bottomTxt = $('#bottom_text').val();
            var id = $('#id').val();

            if(topTxt == ''){
                $('#top_text').addClass('border-danger');
                setNotifyAlert('Field must not be empty!','error');
                return;
            }else{
                $('#top_text').removeClass('border-danger');
            }

            if(bottomTxt == ''){
                $('#bottom_text').addClass('border-danger');
                setNotifyAlert('Field must not be empty!','error');
                return;
            }else{
                $('#bottom_text').removeClass('border-danger');
            }
            $.ajax({
                url : <?= json_encode(route('about-text.update'))?>,
                method:'PUT',
                data: {top_text : topTxt,bottom_text : bottomTxt,id:id },
                success:function (response) {
                     if(response.flag == 'UPDATED'){
                        setSwalAlert('success','Success!',response.message);
                        $('#top_text').val(topTxt);
                        $('#bottom_text').val(bottomTxt);
                        getAboutText();
                        $('#updateTextButton').show();
                        $('#addTextButton').hide();
                        $('#abtHeading').text('Edit About Text');
                    }
                }
            });
        })

    </script>
@stop