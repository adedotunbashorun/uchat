<div class="page-nav">
    @if($prev = $module::prev($model))
        <div class="flex-item">
            <a href="{{$prev->present()->url}}" class="btn btn-small btn-style-6 prev-btn top-tooltip">
                <span class="tooltip">{{$prev->title}}</span>
                Previous {{!empty($title) ? $title : ''}}
            </a>
        </div>
    @endif
    @if($next = $module::next($model))
        <div class="flex-item">
            <a href="{{$next->present()->url}}" class="btn btn-small btn-style-6 next-btn top-tooltip">
                <span class="tooltip">{{$next->title}}</span>
                Next {{!empty($title) ? $title : ''}}
            </a>
        </div>
    @endif
</div>