@extends('core::public.master')

@section('title', 'My Account')
@section('description','')

@section('main')
    <main id="page-main" class="account-page">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">
                    <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="{!! url('/') !!}">Home</a></li>
                            <li class="is-active"><a href="#" aria-current="page">My Account</a></li>
                        </ul>
                    </nav>
                    <div class="page-heading">
                        <div class="level">
                            <div class="level-left">
                                @include('users::public._account-title')
                            </div>
                            <div class="level-right">
                                @include('users::public._stats')
                            </div>
                        </div>
                    </div>

                    <nav class="tabs is-centered is-boxed">
                        <ul>
                            <li class="{!! request()->is('account/dashboard') ? 'is-active' : '' !!}">
                                <a href="{{route('account.dashboard')}}">
                                    <span class="icon is-small"><i class="fa fa-dashboard" aria-hidden="true"></i></span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                                    <span>View Requests</span>
                                </a>
                            </li>
                            <li class="{!! (request()->is('account/profile') or request()->is('account/change-password')) ? 'is-active' : '' !!}">
                                <a href="{{route('profile.index')}}">
                                    <span class="icon is-small"><i class="fa fa-edit" aria-hidden="true"></i></span>
                                    <span>My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="has-text-centered">@include('core::public._partials.notify')</div>

                    <div class="page-content content">
                        @yield('page')
                    </div>


                </div>
                <div class="page-side">
                    @include('pages::public._widget-categories')
                    @include('pages::public._widget-contact')
                    @include('pages::public._widget-newsletter')
                </div>
            </div>
        </div>
    </main>

@stop