@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="about-us section register">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-sm-12">
                    @include('core::public._partials.notify')
                    @if($categories = Categories::allBy('status', 1))
                        @if(count($categories))
                        <div class="row">
                            @foreach ($categories as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="single-course">
                                        <div class="course-head overlay">
                                            <img src="{!! $item->present()->thumbSrc(371,250) !!}" alt="{{$item->title}}">
                                            {{--  <a href="{{$item->present()->url}}" class="btn"><i class="fa fa-link"></i></a>  --}}
                                        </div>
                                        <div class="single-content">
                                            <h4>
                                                {{--  <a href="{{$item->present()->url}}">
                                                    {!! $item->title !!}
                                                </a>  --}}
                                            </h4>
                                            <p>{!! $item->present()->bodyFew(250) !!}</p>
                                        </div>
                                        <div class="course-meta">
                                            <div class="meta-left">
                                                {{--  <span><i class="fa fa-clock-o"></i>{!! $item->present()->duration !!}</span>  --}}
                                            </div>
                                            <span class="price">{{config('myapp.currency','$').$item->present()->amount}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    @endif
                        <div class="auth-form">
                            {!! form_start($register_form,['class'=>'ajax-form','data-redirect'=>url('/login')]) !!}
                            
                            {!! form_end($register_form,false) !!}
                        </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
<script>
    $(document).ready(function() {
        var noSuggestionNoticeMsg = "No results found, inputted text would be added as a base record.";
        // autoCompleteInputLookup($("input[name=interests]"), $('input[name=interest_id]'), "{{route('ajax.interests.search')}}", true, noSuggestionNoticeMsg);
        multipleSelect($("#interests"),"{{route('ajax.interests.search')}}", "select interests", true);
    });
</script>
@section('js')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var CHECKOUT_URL = "{{route('checkout.post')}}";
        var STRIPE_KEY = "{{ config('myapp.stripe_publish_key',env('STRIPE_KEY')) }}";
        var locationRoute = "";
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{config('myapp.paypal_client_id',env('PAYPAL_CLIENT_ID'))}}"></script>
    <script src="{{ asset('assets/public/js/pages/stripe.js') }}"></script>
    <script src="{{ asset('assets/public/js/pages/paypal.js') }}"></script>
@stop
@endsection