@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Channel</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#single" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Single</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#search" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Search</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane p-20 active" id="single" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3"> </div>
                                    <div class="col-sm-6"> 
                                        <form action="{{route('admin.channels.new')}}" class="form-horizontal" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="mode" value="single"/>
                                            <div class="form-body">
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-3">Category</label>
                                                            <div class="col-md-9">
                                                                <select name="category" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                                    @foreach($categories as $c)
                                                                    <option value="{{$c->id}}">{{$c->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-3">Youtube Channel URL: </label>
                                                            <div class="col-md-9">
                                                                <input name="channel" type="text" class="form-control" placeholder="https://youtube.com/channel/channelID">
                                                                <small class="form-control-feedback"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-3"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                <button type="button" class="btn btn-inverse">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3"> </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-3"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-20" id="search" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3"> </div>
                                    <div class="col-sm-6"> 
                                        <form action="{{route('admin.channels.new')}}" class="form-horizontal" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="mode" value="search"/>
                                            <div class="form-body">
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-3">Category</label>
                                                            <div class="col-md-9">
                                                                <select name="category" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                                    @foreach($categories as $c)
                                                                    <option value="{{$c->id}}">{{$c->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-3">Search Query: </label>
                                                            <div class="col-md-9">
                                                                <input name="query" type="text" class="form-control" placeholder="Comedy">
                                                                <small class="form-control-feedback"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-3"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                <button type="button" class="btn btn-inverse">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3"> </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-3"> </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection