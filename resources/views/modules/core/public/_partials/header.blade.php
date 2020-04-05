<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <!-- Contact -->
                    <ul class="content">
                        <li style="font-style:italic">{!! config('myapp.slogan',"Don't train hard...train right")!!}</li>
                    </ul>
                    <!-- End Contact -->
                </div>
                <div class="col-lg-4 col-12">
                    <!-- Social -->
                    <ul class="social">
                        <li><a href="{!! config('myapp.twitter')!!}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{!! config('myapp.facebook')!!}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{!! config('myapp.linkedin')!!}"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="{!! config('myapp.youtube')!!}"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                    <!-- End Social -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{ asset('uploads/settings/'.config('myapp.image')) }}" alt=""></a>
                    </div>
                    <div class="mobile-menu"></div>
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <div class="single-widget">
                            <i class="fa fa-phone"></i>
                            <h4>Call Now<span>{!! config('myapp.phone')!!}</span></h4>
                        </div>
                        <div class="single-widget">
                            <i class="fa fa-envelope-o"></i>
                            <h4>Send Message<a
                                        href="mailto:{!! config('myapp.contact_email')!!}"><span>{!! config('myapp.contact_email')!!}</span></a>
                            </h4>
                        </div>
                        <div class="single-widget">
                            <i class="fa fa-map-marker"></i>
                            <h4>Our Location<span>{!! config('myapp.address')!!}</span></h4>
                        </div>
                    </div>
                    <!--/ End Header Widget -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
    <!-- Header Menu -->
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-collapse">
                            <!-- Main Menu -->
                            <ul id="nav" class="nav menu navbar-nav">
                                {!! Menus::render('main') !!}
                            </ul>
                            <!-- End Main Menu -->
                            <!-- button -->
                            <div class="button">
                                @if($user and $user->hasRoleName('User'))
                                    <div class="dropdown">
                                        <button class="btn btn-login dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user"></i> {{$user->present()->fullname}}
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <a class="dropdown-item" href="{{route('orders.index')}}">My Registrations</a>
                                            <a class="dropdown-item" href="{{route('profile.index')}}">Update Profile</a>
                                            <a class="dropdown-item" href="{{route('profile.change-password')}}">Change Password</a>
                                            <a class="dropdown-item" href="{{url('auth/logout')}}">Logout</a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{url('login')}}" class="btn btn-login">login</a>
                                    <a href="{{url('register')}}" class="btn">Register</a>
                                @endif
                            </div>
                            <!--/ End Button -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Menu -->
</header>