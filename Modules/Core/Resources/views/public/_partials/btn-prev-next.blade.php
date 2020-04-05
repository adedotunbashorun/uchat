<div class="btn-group-prev-next">
    <div class="btn-group">
        <a class="btn btn-sm btn-prev btn-default @if(!$prev = $module::prev($model))disabled @endif" href="@if($prev){{ route($model->getTable() . '.slug', $prev->slug) }}@endif">Previous</a>
        <a class="btn btn-sm btn-prev btn-default" href="{{ url($page->uri) }}">{{ $page->title }}</a>
        <a class="btn btn-sm btn-next btn-default @if(!$next = $module::next($model))disabled @endif" href="@if($next){{ route($model->getTable() . '.slug', $next->slug) }}@endif">Next</a>
    </div>
</div>