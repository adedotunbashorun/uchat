<!-- Single Slider -->
<div class="single-slider overlay" style="background-image:url('{{$banner->present()->thumbSrc()}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="slider-text">
                    <h1>{!! $banner->present()->caption !!}</h1>
                    @if(!empty($banner->body))
                        <p>{!! $banner->present()->body !!}</p>
                    @endif
                    @if(!empty($banner->link))
                        <div class="button">
                            <a href="{{$banner->link}}"
                               class="btn primary">{!! !empty($banner->link_label) ? $banner->link_label : 'Learn More'!!}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Single Slider -->