@extends('pages::public.master')
@section('css')

@stop
@section('page')
    {{$page->image}}
    {!! $page->present()->thumb(300,300) !!}
    {!! $page->present()->body !!}

    @if($video = Videos::getFirst())
        <div class="row video-sec">
            <iframe width="100%" height="200" src="{{$video->video_url}}" frameborder="0" allowfullscreen></iframe>
        </div>
    @endif

    @if($banners = Banners::all())
        @foreach($banners as $banner)
            <div class="col-md-4">
                <img src="{{$banner->present()->thumbSrc(300,300)}}"/>
            </div>
        @endforeach
    @endif
@stop
