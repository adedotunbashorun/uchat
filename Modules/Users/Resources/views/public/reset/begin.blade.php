@extends('core::public.master')

@section('title', 'Reset Password' . $metaTitle)
@section('ogTitle', 'Reset Password')
@section('description', 'Reset Password')

@section('css')

@stop

@section('js')

@stop

@section('main')

    <style>
        .notify {
            text-align: center;
        }
    </style>
    <section class="trd-page-breadcumb-header">
        <div class="container">
            <div class="row">
                <h1 class="trd-page-title">Reset Password</h1>
                <div class="trd-breadcumb-wrapper">
                    <a href="#">Home </a>
                    <span>Reset Password</span>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row gl-page-content-section trd-section">
                <div class="col-md-6 col-sm-12 col-xs-12 col-lg-offset-3">
                    <div class="alert alert-info">
                        {{trans('users::global.reset_info')}}
                    </div>
                    @include('core::public._partials.notify')
                    {!! form_start($form,['class'=>'']) !!}

                    {!! form_row($form->email,['attr'=>['placeholder'=>'','required']]) !!}

                    <button  type="submit" class="trd-btn btn-submit">Reset</button>
                    {!! form_end($form,false) !!}
                </div>
            </div>
        </div>
    </section>

@stop
