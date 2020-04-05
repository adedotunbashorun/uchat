@if($children->count())
    <div class="tg-widget tg-widgetmenu">
        <ul>
            @foreach ($children as $child)
                @include('pages::public._listItem', array('child' => $child))
            @endforeach
        </ul>
    </div>
@endif