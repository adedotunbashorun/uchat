@extends('core::admin.master')

@section('title', $title)

@section('page-css')
    <style>
        .sortable-page li.mjs-nestedSortable-collapsed > ol {
            display: none;
        }
        .portlet.parent {
            box-shadow: none;
        }
        .sortable-page .caret-h{
            color:#333;
            font-size: 20px;
        }

    </style>
@stop

@section('page-js')
    <script type="text/javascript"
            src="{{asset('assets/admin/jquery.mjs.new.nestedSortable.js')}}"></script>
    <script>
        $(function(){
            $.get('{{route('ajax.menus.menu_links.index',$menu->id)}}', {}, function(data){
                $('#orderResult').html(data);
            });

            $('#save').on('click',(function(){
                oSortable = $('.sortable-page').nestedSortable('toArray');
                $('#orderResult').slideUp(function(){
                    $.post('{{route('ajax.menus.menu_links.sort',$menu->id)}}', { sortable: oSortable }, function(data){
                        $('#orderResult').html(data);
                        $('#orderResult').slideDown();
                    });
                });
                return false;
            }));

        });
    </script>
@stop

@section('page-group-title')
    {{trans('menus::global.group_name')}}
@stop

@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{route("admin.menus.index")}}"
       class="kt-subheader__breadcrumbs-link">@Lang('menus::global.name')</a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
        {{$menu->name}} Menu
    </a>
@stop

@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{$menu->name}} Menu
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                @include('core::admin._button-back')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                                Links
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                            <div class="kt-portlet__head-actions">                
                                                <a href="#"
                                                    class="btn btn-circle btn-success btn-sm" id="save">
                                                     <i class="fa fa-plus"></i> Sort </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    <div class="alert alert-info">
                                        Drag to order links and then click <strong>'Sort'</strong> Button above
                                    </div>
                                    <div id="orderResult"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                                Add New link
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                            <div class="kt-portlet__head-actions">                
                                                @include('core::admin._button-fullscreen')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body" style="padding-bottom:20px;">
                                    @include('menus::admin.menu_links._form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop