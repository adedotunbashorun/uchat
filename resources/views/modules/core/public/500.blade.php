@extends('core::public.master')

@section('title', config('myapp.website_title').' | Page Not Found')
@section('ogTitle', '')
@section('description', '')

@section('css')
    <style>

        .f-left{
            float:left;
        }
        .f-right{
            float:right;
        }
        .clear{
            clear: both;
            overflow: hidden;
        }
        #block_error{
            width: 845px;
            height: 384px;
            border: 1px solid #cccccc;
            margin: 72px auto 0;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            background: #fff url(http://www.ebpaidrev.com/systemerror/block.gif) no-repeat 0 51px;
        }
        #block_error div{
            padding: 100px 40px 0 186px;
        }
        #block_error div h2{
            color: #e75204;
            font-size: 24px;
            display: block;
            padding: 0 0 14px 0;
            border-bottom: 1px solid #cccccc;
            margin-bottom: 12px;
            font-weight: normal;
        }
    </style>
@stop

@section('page-banner')

@stop

@section('js')

@stop

@section('main')
    <div id="block_error">
        <div>
            <h2>&nbspOops!!! you've have encountered an error</h2>
            <p>
                Your request cannot be completed at this time, please try again later or call us on <strong>{{config('myapp.phone')}}</strong>
                for assistance. Thank you.
            </p>
        </div>
    </div>
@stop