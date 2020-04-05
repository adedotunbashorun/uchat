@extends('core::admin.master')

@section('page-css')
    <link href="{{asset('assets/admin/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet"/>
@stop

@section('page-js')
    <script src="{{asset('assets/admin/global/plugins/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin/global/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/admin/pages/scripts/calendar.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            Calendar.init();
        });
    </script>
@stop

@section('page-group-title')
    Dashboard
        <small></small>
@stop

@section('main')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-table"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349">0</span>
                    </div>
                    <div class="desc"> Pages </div>
                </div>
                <a class="more" href="javascript:;"> View
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-group"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="89">0</span></div>
                    <div class="desc">Celebrities </div>
                </div>
                <a class="more" href="javascript:;"> View
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12,5">0</span></div>
                        <div class="desc">Posts </div>
                    </div>
                    <a class="more" href="javascript:;"> View
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-photo"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="549">0</span>
                        </div>
                        <div class="desc"> Videos </div>
                    </div>
                    <a class="more" href="javascript:;"> View
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

    </div>

@stop


