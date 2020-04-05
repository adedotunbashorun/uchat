
<div class="sidebar sidebar-right">

    <h5 style="margin-top: 0;">Categories</h5>
    @if($cats = PostCategories::all(['posts']))
        <ul class="categories">
            @foreach($cats as $cat)
                <li><a href="{{$cat->present()->url}}">{{$cat->category}}</a><span> ({{$cat->posts->count()}}
                        )</span></li>
            @endforeach
        </ul>
    @endif

    <h5>Tags</h5>
    <ul class="tags">
        @if($tags = Tags::all([],true))
            @foreach($tags as $tag)
                <li><a href="{{$tag->present()->url}}">{{$tag->title}}</a></li>
            @endforeach
        @endif

    </ul>
</div>