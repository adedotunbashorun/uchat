@extends('core::public.account-master')

@section('breadcrumbs')
    <li>My Profile</li>
@stop

@section('page')
    <div class="account-page-title">
        <h3>Update Profile</h3>
        <p>Use the form below to update your profile</p>
    </div>
    <div class="auth-form">
    {!! form_start($form,['class'=>'ajax-form']) !!}
    <div class="form-row">
        <div class="col">{!! form_row($form->first_name) !!}</div>
        <div class="col">{!! form_row($form->last_name) !!}</div>
    </div>
    <div class="form-row">
        <div class="col">{!! form_row($form->phone) !!}</div>
        <div class="col"> {!! form_row($form->email,['attr'=>['disabled']]) !!}</div>
    </div>
    <div class="form-row">
        <div class="col">{!! form_row($form->address) !!}</div>
    </div>
    <div class="form-group auth-form-action">
        <div class="button">
            <button type="submit" class="btn btn-primary border-radius">Update Profile</button>
        </div>
    </div>
    {!! form_end($form,false) !!}
    </div>
@stop