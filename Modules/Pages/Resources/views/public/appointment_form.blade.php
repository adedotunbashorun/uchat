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
                    <h2 class="col-title" ><i class="title-icon icon-edit custom-icon-color25" ></i>Request Appointment</h2>
                    <span class="liner"></span>
                </div>
                @include('pages::public._notify')

                <div class="ttcf7" id="ttcf7-f5-p263-o2" lang="en-US" dir="ltr">
                    <div class="screen-reader-response" ></div>
                    
                    {!! Form::open(array('route' => 'appointment.post','class'=>'ttcf7-form','role'=>'form')) !!}
                    <p>Your Name (required)<br />
                        <span class="ttcf7-form-control-wrap name">{!!Form::text('name',null,['class'=>'ttcf7-form-control ttcf7-text ttcf7-validates-as-required','size'=>40])!!}</span></p>
                    <p>Your Email (required)<br />
                        <span class="ttcf7-form-control-wrap email">{!!Form::email('email',null,['class'=>'ttcf7-form-control ttcf7-text ttcf7-validates-as-required','size'=>40])!!}</span></p>
                    <p>Phone<br />
                            <span class="ttcf7-form-control-wrap subject">{!!Form::text('phone',null,['class'=>'ttcf7-form-control ttcf7-text','size'=>40])!!}</span></p>
                        <p>Appointment Date<br />
                            <span class="ttcf7-form-control-wrap date"><input type="date" name="date" id="date" value="" size="40" class="ttcf7-form-control ttcf7-text" aria-invalid="false" /></span></p>
                    <p>Your Message<br />
                            <span class="ttcf7-form-control-wrap message">
                                {!!Form::textarea('message',null,['class'=>'ttcf7-form-control ttcf7-textarea','cols'=>40, 'row'=>10])!!}</span> </p>
                    <p>{!!Form::submit('Submit',['class'=>'ttcf7-form-control ttcf7-submit','style'=>'color:#fff'])!!}</p>

                    {!!Form::close()!!}

                </div>

            </div>

            <div class="grid_4">
                @include('pages::public._related_pages')
                @include('pages::public._faq-block')
            </div>
        </div><div class="gap clearfix custom-h30" ></div>
    </div><!-- end page-content -->
@stop
