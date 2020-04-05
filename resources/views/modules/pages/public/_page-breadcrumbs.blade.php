<nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
    <ul>
        <li><a href="#">Home</a></li>
        @if($page->parent)
            <li><a href="{!! url( $page->parent->uri) !!}">{!! $page->present()->parentTitle !!}</a></li>
        @endif
        <li class="is-active"><a href="#" aria-current="page">{{$page->title}}</a></li>
    </ul>
</nav>