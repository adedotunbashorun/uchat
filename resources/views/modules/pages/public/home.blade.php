@extends('pages::public.master')

@section('page')

    @include('banners::public._list')

    <section class="courses section-bg section">
        <div class="container">
            <div class="row">
                <div class="col-12 wow zoomIn">
                    <div class="section-title">
                        <h2>Welcome to  <span>UOT Careers</span></h2>
                        {!! $page->body !!}
                    </div>
                </div>
            </div>
            {{-- @include('courses::public._list-home') --}}
        </div>
    </section>

    @include('pages::public._section-call-out')

    {{-- @include('testimonials::public._list-home') --}}



@endsection

