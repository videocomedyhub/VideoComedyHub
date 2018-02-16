@extends('backend.layouts.app')

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add New Category</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.categories.new')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <h3 class="card-title">Basic Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input name="title" type="text" id="firstName" class="form-control" placeholder="comic">
                                    <small class="form-control-feedback"> Enter the title of the category </small> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <input name="slug" type="text" id="lastName" class="form-control" placeholder="12n">
                                    <small class="form-control-feedback"> This field has error. </small> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input name="description" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Featured</label>
                                    <select name="featured" class="form-control custom-select" data-placeholder="Add to Featured" tabindex="1">
                                        <option value="1">Featured</option>
                                        <option value="0">Not Featured</option>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <div class="form-check">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="active" type="radio" value="1" checked class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Active</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="active" type="radio" value="0" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Inactive</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="box-title m-t-40">S.E.O</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="seo_title" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <input type="text" name="seo_description" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" name="tags" data-role="tagsinput">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                        <button type="button" class="btn btn-inverse">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection
@section('styles')
<link href="{{asset('backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endsection
@section('scripts')
<script src="{{asset('backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
@endsection