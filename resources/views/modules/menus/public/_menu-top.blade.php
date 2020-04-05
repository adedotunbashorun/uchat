@if ($menu = Menus::getMenu($slug))
    @if ($menu->menu_links->count())
        @foreach ($menu->menu_links as $menu_link)
            <a href="{{ url($menu_link->href) }}" @if($menu_link->target) target="{{ $menu_link->target }}" @endif>{{ $menu_link->title }}</a>
        @endforeach
    @endif
@endif
