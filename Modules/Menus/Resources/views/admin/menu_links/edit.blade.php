@extends('core::admin.master')

@section('title', trans($module . '::global.edit').' - '.$model->present()->title))

@section('page-css')

@stop

@section('page-js')

@stop

@section('page-group-title')
    @Lang('Menus')
    <small>@Lang('Use This Section TO Manage Menu Links')</small>
@stop

@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Menus</a>
    </li>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject theme-font-color bold">
                            {{$model->title}}
                        </span>
                    </div>
                    <div class="actions">
                        <a href="javascript:history.back(-1)" class="btn btn-circle btn-default btn-sm">
                            <i class="fa fa-arrow-left"></i> back </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    @include('menus::admin.menu_links._form')
                </div>
            </div>
        </div>
    </div>

@stop