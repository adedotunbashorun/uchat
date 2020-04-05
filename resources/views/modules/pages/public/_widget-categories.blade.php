@if($categories = Categories::latest(8))
    <div class="widget">
        <h4 class="widget-title">Browse Services</h4>
        <div class="widget-content">
            <div class="category-list">
                @foreach($categories as $category)
                    <a href="{{$category->present()->url}}" class="category-item">
                        <span class="category-icon">
                            <img src="{{$category->present()->thumbSrc(48,48,[],'icon')}}"
                                 alt="{!! $category->category !!}">
                        </span>
                        <span>
                            {!! $category->category !!}
                        </span>
                    </a>
                @endforeach
            </div>
            <a href="{!! route('categories') !!}" class="button is-primary is-small">View More Services</a>
        </div>
    </div>
@endif