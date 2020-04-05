@extends('core::public.master')

@section('title', $page->title . $websiteTitle)
@section('description', $page->meta_description)
@section('ogTitle', $page->title . $websiteTitle)
@section('ogDescription', $page->meta_description)

@section('db-css')
	@if($page->css)
		<style type="text/css">
			{{ $page->css }}
		</style>
	@endif
@stop

@section('db-js')
	@if($page->js)
		<script>
			{{ $page->js }}
		</script>
	@endif
	
@stop

@section('main')

	@yield('page')

@stop