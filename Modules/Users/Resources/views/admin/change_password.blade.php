@extends('core::admin.master')

@section('title', trans($module . '::global.new'))

@section('page-css')

@stop

@section('page-js')

@stop

@section('page-group-title')
    @Lang($module . '::global.group_name')
    <small>@Lang($module . '::global.group_description')</small>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                @include('core::admin._porlet-title', ['module' => $module,'type'=>'back','caption'=>'change_pasword'])
                <div class="portlet-body form">
                    {!! form_start($form,['class'=>'']) !!}
                    @include('core::admin._save-form',['top'=>true])
                    <div class="form-body">
                        {!! form_rest($form) !!}
                    </div>
                    @include('core::admin._save-form')
                    {!! form_end($form,false) !!}
                </div>
            </div>
        </div>
    </div>

@stop