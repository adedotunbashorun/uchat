@extends('pages::public.master')

@section('page')
    <div class="breadcrumb-place ">
        <div class="row clearfix">
            <h1 class="page-title">{!! $page->present()->parentTitle !!}</h1>
        </div><!-- row -->
    </div><!-- breadcrumb -->

    <div class="page-content">

        <div class="row clearfix" >

            <div class="gap clearfix custom-h40" > </div>

        </div>

        <div class="row clearfix" >

            <div class="grid_8">

                <div class="clearfix title-left">
                    <h2 class="col-title" ><i class="title-icon icon-edit custom-icon-color25" ></i>Contact Form</h2>
                    <span class="liner"></span>
                </div>


                @include('pages::public._notify')

                <div class="ttcf7" id="ttcf7-f5-p263-o2" lang="en-US" dir="ltr">

                    <div class="screen-reader-response" ></div>

                    {!! Form::open(array('route' => 'contact.post','class'=>'ttcf7-form','role'=>'form')) !!}
                        <p>Your Name (required)<br />
                            <span class="ttcf7-form-control-wrap name">{!!Form::text('name',null,['class'=>'ttcf7-form-control ttcf7-text ttcf7-validates-as-required','size'=>40])!!}</span></p>
                        <p>Your Email (required)<br />
                            <span class="ttcf7-form-control-wrap email">{!!Form::email('email',null,['class'=>'ttcf7-form-control ttcf7-text ttcf7-validates-as-required','size'=>40])!!}</span></p>
                        <p>Subject<br />
                            <span class="ttcf7-form-control-wrap subject">{!!Form::text('subject',null,['class'=>'ttcf7-form-control ttcf7-text','size'=>40])!!}</span></p>
                        <p>Your Message<br />
                            <span class="ttcf7-form-control-wrap message">
                                {!!Form::textarea('message',null,['class'=>'ttcf7-form-control ttcf7-textarea','cols'=>40, 'row'=>10])!!}</span> </p>
                        <p>{!!Form::submit('Submit',['class'=>'ttcf7-form-control ttcf7-submit','style'=>'color:#fff'])!!}</p>

                  {!!Form::close()!!}

                </div>

            </div>

            <div class="grid_4" >

                <div class="clearfix title-left">
                    <h2 class="col-title" ><i class="title-icon icon-map-marker custom-icon-color25" ></i>Address</h2>
                    <span class="liner"></span>
                </div>

                <p><strong>{{ config('myapp.address') }}</strong><br />

                <div class="gap clearfix custom-h10"> </div>

                <i class="icon-phone icon-xs custom-icon-color26" ></i> <strong>Tel</strong>:{{ config('myapp.phone') }}

                <div class="clearfix" ></div>
                <i class="icon-envelope-alt icon-xs custom-icon-color26" ></i> <strong>Email:</strong> {{ config('myapp.contact_email') }}

                <div class="clearfix" ></div>

                <div class="gap clearfix custom-h100"> </div>

                <div class="clearfix title-left">
                    <h2 class="col-title" >
                        <i class="title-icon icon-time custom-icon-color25" ></i>Business Hours</h2>
                    <span class="liner"></span>
                </div>

                <p><strong>Monday</strong> to<strong> Friday</strong>: 9.00 AM – 5.00 PM<br />
                    <strong>Saturday</strong> : 10.00 AM – 2.00 PM<br />
                    <strong>Sunday</strong>: Closed
                </p>
            </div>
        </div><div class="gap clearfix custom-h30" ></div>
    </div><!-- end page-content -->
@stop
