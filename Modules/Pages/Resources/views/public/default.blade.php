@extends('pages::public.master')

@section('page')
    <h2>{!! $page->present()->parentTitle !!}</h2>
    @if($page->parent)
     <h4>{!! $page->title !!}</h4>
    @endif
    {!! $page->present()->body !!}
    @if($children)
        <ul>
            @foreach ($children as $child)
                @include('pages::public._listItem', array('child' => $child))
            @endforeach
        </ul>
    @endif
@stop
