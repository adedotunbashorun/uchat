@extends('core::admin.master')

@section('title', $title)

@section('page-css')
    <link href="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('page-js')
    <script src="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script>
        $(function() {
            $('#datatable').DataTable();
        });
    </script>
@stop

@section('page-group-title')
    {{trans($module . '::global.group_name')}}
@stop

@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.name')</a>
@stop

@section('main')
    <div class="kt-portlet kt-portlet--mobile">
        @include('history::admin._porlet-title', ['module' => $module,'type'=>'create','caption'=>'index'])
        <div class="kt-portlet__body">
            <div class="table-scrollable">
                <table class="table table-striped table-hover" id="datatable">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th> Title</th>
                        <th> Module</th>
                        <th> Action</th>
                        <th> User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $history)
                        <tr>
                            <td>{{ $history->created_at}}</td>
                            <td>
                                <a href="{{ $history->href }}">{{ $history->title }}</a>
                            </td>
                            <td>{{ $history->historable_table }}</td>
                            <td>
                                <span class="label label-{{$history->present()->iconBgColor}}"><i class="fa {{ $history->icon_class }}"></i> {{ $history->action }}</span>
                            </td>
                            <td>{{ $history->user_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop