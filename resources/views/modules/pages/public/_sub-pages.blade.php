<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid-item">
    <div class="tg-plan">
        <div class="tg-plancontent">
            <i class="tg-planicon lnr lnr-arrow-right-circle"></i>
            <div class="tg-titledescription">
                <div class="tg-plantitle">
                    <h3 @if($sub_page->body == '') style="margin-top:25px;" @endif><a href="{{ url($sub_page->uri) }}">{{$sub_page->title}}</a></h3>
                </div>
                <div class="tg-description">
                   {!! $sub_page->present()->bodyFew(20) !!}
                </div>
            </div>
        </div>
    </div>
</div>