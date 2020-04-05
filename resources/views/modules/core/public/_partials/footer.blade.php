<footer class="footer overlay section wow fadeIn">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- About -->
                    <div class="single-widget about">
                        <p>{!! config('myapp.footer_about_msg')!!}</p>
                        <ul class="list">
                            <li><i class="fa fa-phone"></i>{{config('myapp.phone')}} </li>
                            <li><i class="fa fa-envelope"></i> <a
                                        href="mailto:{{config('myapp.contact_email')}}">{{config('myapp.contact_email')}}</a>
                            </li>
                            <li><i class="fa fa-map-o"></i>{{config('myapp.address')}}</li>
                        </ul>
                        <ul class="social">
                            <li><a href="{!! config('myapp.twitter')!!}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{!! config('myapp.facebook')!!}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{!! config('myapp.linkedin')!!}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{!! config('myapp.youtube')!!}"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <!--/ End About -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Useful Links -->
                    <div class="single-widget useful-links">
                        <h2>Useful Links</h2>
                        <ul>
                            {!! Menus::render('footer') !!}
                        </ul>
                    </div>
                    <!--/ End Useful Links -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Latest News -->
                    {{-- <div class="single-widget latest-news">
                        <h2>Courses</h2>
                        @if($courses  = Courses::latest(3))
                            <div class="news-inner">
                                @foreach($courses as $course)
                                    <div class="single-news">
                                        <img src="{!! $course->present()->thumbSrc(100,100) !!}" alt="#">
                                        <h4><a href="{!! $course->present()->url !!}">{!! $course->title!!}</a></h4>
                                        <p>{!! $course->present()->bodyFew('70') !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <a href="{!! route('courses') !!}" class="view-all">View All Courses</a>
                    </div> --}}
                    <!--/ End Latest News -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Newsletter -->
                    <div class="single-widget newsletter">
                        <h2>Newsletter Signup</h2>
                        <div class="mail">
                            <p>{!! config('myapp.newsletter_msg')!!}</p>
                            <div class="form">
                                <input type="email" placeholder="Enter your email">
                                <button class="button" type="submit"><i class="fa fa-envelope"></i></button>
                            </div>
                        </div>
                    </div>
                    <!--/ End Newsletter -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Top -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bottom-head">
                        <div class="row">
                            <div class="col-12">
                                <!-- Social -->
                                <!-- End Social -->
                                <!-- Copyright -->
                                <div class="copyright">
                                    <p>© Copyright {{date('Y')}} <a href="#">{{config('myapp.website_title')}}</a>. All
                                        Rights Reserved</p>
                                </div>
                                <!--/ End Copyright -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Bottom -->
</footer>