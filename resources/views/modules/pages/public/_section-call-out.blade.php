@if($block = Blocks::bySlug('register'))
    <section class="cta" data-stellar-background-ratio="0.5" style="background-image: url({{$block->present()->thumbSrc()}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-6 col-12">
                    <div class="cta-inner overlay">
                        <div class="text-content">
                            <h2>{!! $block->title !!}</h2>
                            <p>{!! $block->present()->content !!}</p>
                            <div class="button">
                                <a class="btn primary wow fadeInUp" href="{{url($block->link)}}" >{{$block->link_label}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif