@extends('core::admin.master')

@section('title', trans($module . '::global.edit').' - '.$model->name)

@section('page-group-title')
    @Lang($module . '::global.roles.group_name')
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="kt-portlet kt-portlet--mobile">
                @include('core::admin._porlet-title', ['module' => $module,'type'=>'back','caption'=>'roles.edit'])
                <div class="kt-portlet__body form">
                    @include($module . '::admin.roles._form')
                </div>
            </div>
        </div>
    </div>

@stop