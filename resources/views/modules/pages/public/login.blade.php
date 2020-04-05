@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="about-us section register">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    @include('core::public._partials.notify')
                    <div class="auth-form">
                        {!! form_start($login_form,[
                            'class'=>'ajax-form',
                            'data-redirect'=> session('url.intended') ? session('url.intended') : route('orders.index')
                            ])
                        !!}
                        {!! form_row($login_form->email) !!}
                        {!! form_row($login_form->password) !!}
                        <div class="form-group auth-form-action mt-4">
                            <div class="button">
                                <button type="submit" class="btn btn-primary border-radius">Login</button>
                            </div>
                        </div>
                        <p>Not registered yet? click <a href="{{url('register')}}">here </a> to create an account</p>
                        {!! form_end($login_form,false) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop