@extends('core::admin.master')

@section('title', $title)

@section('page-group-title')
    {{trans($module . '::global.roles.group_name')}}
@stop

@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.roles.group_name')</a>
@stop

@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    @include('core::admin._porlet-caption', ['caption' => 'roles.index'])
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                @if(isset($type))
                                    @include('core::admin._button-'.$type, ['module' => $module,'caption'=>$caption])
                                @else
                                    @include('core::admin._button-create', ['module' => 'users.roles'])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    {!! edit_btn(route('admin.users.roles.edit',$role->id)) !!}
                                    {!! delete_btn(route('ajax.users.roles.destroy',$role->id)) !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop