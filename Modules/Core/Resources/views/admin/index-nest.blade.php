@extends('core::admin.master')

@section('title', $title)

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/global/plugins/bootstrap-gtreetable/bootstrap-gtreetable.min.css')}}"/>
@stop

@section('page-js')
    <script type="text/javascript" src="{{asset('assets/admin/global/plugins/bootstrap-gtreetable/bootstrap-gtreetable.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#gtreetable').gtreetable({
                'draggable': true,
                'source': function(id) {
                    return {
                        type: 'GET',
                        url: '{{route('api.'.$module.'.index')}}',
                        data: {
                            'id': id
                        },
                        dataType: 'json',
                        error: function(XMLHttpRequest) {
                            alert(XMLHttpRequest.status + ': ' + XMLHttpRequest.responseText);
                        }
                    }
                },
                'types': { default: 'glyphicon glyphicon-folder-open', folder: 'glyphicon glyphicon-folder-open'},
                'inputWidth': '255px'
            });
        });
    </script>
@stop

@section('page-group-title')
    <h1>{{$title}}
        <small>@Lang($module . '::global.group_description')</small>
    </h1>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font-color hide"></i>
                        <span class="caption-subject theme-font-color bold uppercase">@Lang($module . '::global.index')</span>
                    </div>
                    <div class="actions">
                        <a href="{{route('admin.'.$module. '.create')}}" class="btn btn-circle red-sunglo btn-sm">
                            <i class="fa fa-plus"></i> Add </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                        </a>
                    </div>

                </div>
                <div class="portlet-body">
                    @include($module . '::admin.index')
                </div>
            </div>
        </div>
    </div>

@stop