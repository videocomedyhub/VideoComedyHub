@extends('backend.layouts.app')

@section('content')

<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Videos
                    <span>
                        <a href="{{route('admin.categories.new')}}" class="btn btn-outline-info waves-effect waves-light"><span class="btn-label"><i class="fa fa-film"></i></span>New Category</a>
                    </span>
                </h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Ft</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                            <tr>
                                <td><a href="javascript:void(0)">{{$c->title}}</a></td>
                                <td>{{$c->slug}}</td>
                                <td><span class="label{{$c->active?' label-info':' label-danger'}}">{{$c->active ?'active':'inactive'}}</span></td>
                                <td><span> <i class="fa{{$c->featured ?' fa-check text-info':' fa-close text-danger'}}"></i></span></td>
                                <td class="text-nowrap">
                                    <a href="#" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-folder-open text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<!--stickey kit -->
<script src="{{asset('backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
@endsection