@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="testimonials no-bg overlay section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('pages::public._page-content-body')
                    @include('testimonials::public._list')
                </div>
            </div>
        </div>
    </section>
@stop