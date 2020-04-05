@extends('core::public.master')

@section('title', 'My Account')
@section('description','')


@section('main')
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>My Account</h2>
                    <ul class="bread-list">
                        <li><a href="{{url('/')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">My Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="blog b-archives section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    @include('core::public._partials.notify')
                    @yield('page')
                </div>
                <div class="col-lg-4 col-12">
                    <div class="learnedu-sidebar">
                        <div class="single-widget categories account">
                            <h3 class="title">Welcome, {{$user->present()->fullname}} <small>({{$user->email}})</small></h3>
                            <ul>
                                <li><a href="{{route('orders.index')}}"><i class="fa fa-angle-right"></i>My Registrations</a></li>
                                <li><a href="{{route('profile.index')}}"><i class="fa fa-angle-right"></i>Update Profile</a></li>
                                <li><a href="{{route('profile.change-password')}}"><i class="fa fa-angle-right"></i>Change Password</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-angle-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop