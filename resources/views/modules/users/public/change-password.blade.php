@extends('core::public.account-master')

@section('breadcrumbs')
    <li>My Profile</li>
@stop

@section('page')
    <div class="account-page-title">
        <h3>Change Password</h3>
        <p>Use the form below to change your account password</p>
    </div>
    <div class="auth-form">
        {!! form_start($form,['class'=>'ajax-form']) !!}
        <div class="form-row">
            <div class="col">{!! form_row($form->password) !!}</div>
        </div>
        <div class="form-row">
            <div class="col">{!! form_row($form->confirm_password) !!}</div>
        </div>
        <div class="form-group auth-form-action">
            <div class="button">
                <button type="submit" class="btn btn-primary border-radius">Change Password</button>
            </div>
        </div>
        {!! form_end($form,false) !!}
    </div>
@stop