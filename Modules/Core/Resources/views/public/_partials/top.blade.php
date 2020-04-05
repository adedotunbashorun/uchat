<div class="top-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-2 padding-top-10"><a class="brand" href="#"><i class="fa fa-arrow-left"></i> Main Website</a></div>
            <div class="col-md-10">
                <!--ul class="top-menu-nav list-inline">
                    <li class="active"><a href="#">About us </a></li>
                    <li><a href="#">Our Vision</a></li>
                    <li><a href="#">Our Approach</a></li>
                    <li ><a href="#">Our Students</a></li>
                    <li><a href="#">Registration</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul-->
                <ul class="top-menu-nav list-inline">
                    <li class="padding-top-10"><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
                    <li class="padding-top-10"><a href="{{url('programs')}}"><i class="fa fa-list"></i> All Programs </a></li>
                    <li class="padding-top-10"><a href="{{url('programs/category/summer-camp')}}"><i class="fa fa-sun-o"></i> Summer Camp Programs </a></li>

                    <li class="padding-top-10"><a href="{{route('programs.single.cart')}}"><i class="fa fa-list"></i> Selected Programs (Review) </a></li>
                    @if(!is_parent_group())
                        <li class="padding-top-10"><a href="{{url('auth/login')}}"><i class="fa fa-sign-in"></i> Login </a></li>
                    @else
                        <li>
                            <div class="btn-group">
                                <a href="#" class="btn blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:0;padding: 10px 12px;">
                                    <i class="fa fa-user"></i> My Account ({{current_user()->email}}) <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('admin.dashboard')}}">
                                            <i class="fa fa-home"></i> Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.students.create')}}">
                                            <i class="fa fa-user"></i> Add Child </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.users.change-password')}}">
                                            <i class="fa fa-key"></i> Change Password </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                            <i class="fa fa-sign-out"></i> Log Out </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>