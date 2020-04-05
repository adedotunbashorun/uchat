@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <div id="content" class="page-content-wrap">
        <div class="container wide">
            @include('pages::public._page-content-body')         
            @include('partners::public._list')
        </div>
    </div>
@stop