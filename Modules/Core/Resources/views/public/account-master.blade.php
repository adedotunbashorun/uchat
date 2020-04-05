@extends('core::public.master')

@section('title', 'Airplex')
@section('description','')

@section('main')
    <div class="row user-profile">
        <div class="container">
            <div class="col-md-12 user-name">
                <h3>Welcome, Lenore</h3>
            </div>
            @include('core::public._account-sidebar')
            @yield('page')
        </div>
    </div>

@stop