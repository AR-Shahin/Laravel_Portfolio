@extends('layouts.back_master')
@section('title','Category')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <script>
                        var root_url = <?php echo json_encode(route('get.category')) ?>;
                        {{--var cat_dlt_url = <?php echo json_encode(route('category.destroy')) ?>;--}}
                    </script>
                    <h4 class="text-info">Category</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            @php
                                $i=1;
                            @endphp
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="catTable">
                            <tr>
                                <td>1</td>
                                <td>Php</td>
                                <td class="text-center">
                                    <span class="badge badge-success">Active</span>

                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-sm btn-info">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
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
                    <form action="" method="post" id="catForm">
                        @csrf
                        <label for="">Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Category Name" id="cat_name">
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
    </script>
@stop

