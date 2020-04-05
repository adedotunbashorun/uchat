@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <div id="content">
        <div class="page-section">
            <div class="container wide">
                <div class="title-holder align-center">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </div>
@stop