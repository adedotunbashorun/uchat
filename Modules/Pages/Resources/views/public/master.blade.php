@extends('core::public.master')

@section('title', $page->title . ' – ' . $websiteTitle)
@section('ogTitle', $page->title)
@section('description', $page->description)
@section('image', URL::to($page->present()->thumbSrc()))
@section('bodyClass', 'body-page body-page-' . $page->id)

@section('css')
	@if($page->css)
		<style type="text/css">
			{{ $page->css }}
		</style>
	@endif
@stop

@section('js')
	@if($page->js)
		<script>
			{{ $page->js }}
		</script>
	@endif
@stop

@section('main')

	@yield('page')

@stop