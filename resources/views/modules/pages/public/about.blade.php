@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <div id="content">
        <div class="page-section">
            <div class="container wide">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title-holder">
                            {!! $page->body !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icons-box style-1 type-2">
                            @if($children = $page->children)
                                @foreach($children as $child)
                                    <div class="icons-wrap">

                                        <div class="icons-item">
                                            <div class="item-box">
                                                <h4 class="icons-box-title">{!! $child->title !!}</h4>
                                                {!! $child->body !!}
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($l_page = \Pages::bySlug('our-leadership'))
            <div class="page-section-bg parallax-section" data-bg="{{ $l_page->present()->thumbSrc() }}">

                <div class="container wide">

                    <div class="row">

                        <div class="col-lg-5">

                            <div class="pre-title color2">{!! $l_page->title !!}</div>
                            <h2 class="title2">{!! $l_page->tagline !!}</h2>
                            {!! $l_page->body !!}

                        </div>

                    </div>

                </div>

            </div>
        @endif
    </div>
@stop