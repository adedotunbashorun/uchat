@if ($menu = Menus::getMenu($slug))

    @if ($menu->menu_links->count())
        <ul class="{{ $menu->class }}" role="menu">
            @foreach ($menu->menu_links as $menu_link)
                @include('menus::public._item')
            @endforeach
        </ul>
    @endif

@endif
