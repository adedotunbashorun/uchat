@extends('core::public.account-master')

@section('title','My Profile '.config('myapp.meta_title'))


@section('css')

@stop

@section('js')

@stop

@section('main')

    <section class="main after-nav category">
        <div class="container">

            <section class="static-page m-bot-30">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Static page navigation -->
                        <ul class="nav nav-tabs nav-stacked side-bar">
                            <li class="current"><a href="#" title="About us" class="title">My Profile</a></li>
                            <li><a href="#" title="About us" class="title">Favorites</a></li>
                            <li><a href="#" title="About us" class="title">Shop</a></li>
                            <li><a href="#" title="About us" class="title">Feedback</a></li>
                            <li><a href="#" title="About us" class="title">Treasury</a></li>
                            <li><a href="#" title="About us" class="title">Orders</a></li>

                        </ul>
                        <!-- End static page navigation -->
                    </div>
                    <div class="col-md-9">
                        <div class="content">

                            @include('core::public._partials.notify')
                                <div class="trd-tab-wrapper">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#pba" aria-controls="pba" role="tab" data-toggle="tab">Edit Profile</a></li>
                                        <li role="presentation"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">Change Password</a></li>

                                    </ul>

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="pba">
                                            {!! form_start($form,['class'=>'']) !!}
                                            <div class="row">
                                                <div class="col-md-12">{!! form_row($form->first_name) !!}</div>
                                                <div class="col-md-12">{!! form_row($form->last_name) !!}</div>
                                                <div class="col-md-12">{!! form_row($form->phone) !!}</div>
                                                <div class="col-md-12">{!! form_row($form->address) !!}</div>
                                                <div class="col-md-12">{!! form_row($form->email,['attr'=>['disabled']]) !!}</div>
                                            </div>
                                            <button type="submit" class="trd-btn">Submit</button>
                                            {!! form_end($form,false) !!}
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="report">
                                            {!! form_start($password_form) !!}
                                            <div class="row">
                                                <div class="col-md-12">{!! form_row($password_form->password) !!}</div>
                                                <div class="col-md-12">{!! form_row($password_form->confirm_password) !!}</div>

                                            </div>
                                            <button type="submit" class="trd-btn">Submit</button>
                                            {!! form_end($form,false) !!}
                                        </div>
                                    </div>
                                </div>




                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


@stop