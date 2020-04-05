@extends('core::admin.master')

@section('title', trans($module . '::global.edit').' - '.$model->present()->title)

@section('page-group-title')
    @Lang($module . '::global.group_name')
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="kt-portlet kt-portlet--mobile">
                @include('core::admin._porlet-title', ['module' => $module,'type'=>'back','caption'=>'edit'])
                <div class="kt-portlet__body form">
                    @include($module . '::admin._form')
                </div>
            </div>
        </div>
    </div>

@stop