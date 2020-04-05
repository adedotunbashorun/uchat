@if($page = Pages::bySlug('our-services'))

<section class="section home-services-wrapper bg-grey" style="background: url('{{asset('assets/public/img/services-bg.jpg')}}')">
    <div class="container">
        <div class="main-heading has-text-centered">
            <h2 class="title is-3">{{$page->title}}</h2>
        </div>
        <div class="columns">
            @foreach($page->children->take(4) as $service)
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <span class="icon"><i class="fa fa-{{$service->icon}}"></i></span>
                        <div class="content">
                            <p class="title">{{$service->title}}</p>
                            <p class="subtitle">
                               {!! $service->body !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="has-text-centered has-margin-t-3">
            <a href="{{url('our-services')}}" class="button is-primary is-medium">
                View Our Services
            </a>
        </div>
    </div>
</section>
@endif