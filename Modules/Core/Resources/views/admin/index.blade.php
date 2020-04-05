@extends('core::admin.master')

@section('title', $title)

@section('page-css')
<link href="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('page-js')
<script src="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script>
        const type = "{{ current_user()->churchtype }}";
        const second = {!! json_encode(config($module.'.second_columns')) !!};
        const column = (type && second) ? {!! json_encode(config($module.'.second_columns')) !!} : {!! json_encode(config($module.'.columns')) !!}
        $(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.'.$module.'.datatable')}}',
                columns: column,
                drawCallback:function(){
                    $(".delete-me").click(function () {
                        if(confirm($(this).attr('data-confirm'))){
                            $.ajax({
                                url: $(this).attr('href'),
                                type: 'DELETE',
                                success: function(data){
                                    document.location.href = '{{route('admin.'.$module.'.index')}}';
                                },
                                data: {_token: '{{csrf_token()}}'}
                            })
                        }
                        return false;
                    });

                    $('.tooltips').tooltip();

                }
            });
        });
    </script>
@stop

@section('page-group-title')
    {{trans($module . '::global.group_name')}}
@stop


@section('main')
    <div class="kt-portlet kt-portlet--mobile">
        @include('core::admin._porlet-title', ['module' => $module,'type'=>'create','caption'=>'index'])
        <div class="kt-portlet__body">
            @include($module . '::admin.index')
        </div>
    </div>
@stop