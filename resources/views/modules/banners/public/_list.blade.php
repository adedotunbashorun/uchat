@if($banners = Banners::allBy('status', 1))
    @if(count($banners))
        <section class="home-slider">
            <div class="slider-active">
                @foreach($banners as $banner)
                    @include('banners::public._list-item')
                @endforeach
            </div>
        </section>
    @endif
@endif

