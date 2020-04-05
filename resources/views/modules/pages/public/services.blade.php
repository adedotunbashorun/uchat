@extends('pages::public.master')
@section('page')
    <div class="page-services">
        @include('pages::public._page-banner-section')
        <section class="section bg-grey">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <div class="content">
                            @include('pages::public._page-content')
                        </div>
                        <div class="main-heading has-text-centered">
                            <h2 class="title is-3">What We Do</h2>
                        </div>
                        <div class="columns is-centered">
                            <div class="column is-8">
                                @foreach($page->children as $service)
                                    <div class="card">
                                        <div class="card-content">
                                            <span class="icon"><i class="fa fa-{{$service->icon}}"></i></span>
                                            <div class="content">
                                                <p class="title">{{$service->title}}</p>
                                                <p class="subtitle">
                                                    {!! $service->body !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop