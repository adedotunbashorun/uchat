<div class="tg-pagetitle tg-haslayout" style="background:url({!! isset($page->banner) ? $page->present()->thumbSrc(1200,150,[],'banner') : asset('assets/public/images/page-banner.jpg') !!})">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-titleandbtns">
                    <h1>
                        @if($page->parent)
                            {!! $page->present()->parentTitle !!}
                        @else
                            {{$page->title}}
                        @endif
                    </h1>

                </div>
            </div>
        </div>
    </div>
</div>