@extends('core::public.master')

@section('title', 'My Account')
@section('description','')

@section('main')

    <section class="section bg-grey my-account" id="page-title">
        <div class="container">
            <div class="page-caption account-page-caption">
                <div class="level">
                    <div class="level-left">
                        @include('users::public._account-title')
                    </div>
                    <div class="level-right">
                        @include('users::public._stats')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="has-text-centered">@include('core::public._partials.notify')</div>

    <section class="section" id="page-content">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    <aside class="menu box">
                        <ul class="menu-list">
                            <li class="menu-label">Welcome {!! $user->present()->fullname !!}</li>
                            <li><a href="{{route('account.dashboard')}}" class="{!! request()->is('account/dashboard') ? 'is-active' : '' !!}">Dashboard</a></li>
                            <li class="menu-label">Requests</li>
                            <li><a>View Requests</a></li>
                            <li><a href="{!! route('categories') !!}">Make a Request</a></li>
                            <li class="menu-label">My Account</li>
                            <li><a href="{{route('profile.index')}}" class="{!! request()->is('account/profile') ? 'is-active' : '' !!}">Profile</a></li>
                            <li><a href="{{route('profile.change-password')}}" class="{!! request()->is('account/change-password') ? 'is-active' : '' !!}">Change Password</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column">
                    <div class="content">
                        @yield('page')
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop