<li class="{{ request()->is($menu_link->href.'*') ? 'active' : '' }}"><a href="{{ url($menu_link->href) }}" @if($menu_link->target) target="{{ $menu_link->target }}" @endif>{{ $menu_link->title }}
        @if ($menu_link->items->count()) <i class="fa fa-angle-down"></i> @endif
    </a>
    @if ($menu_link->items->count())
            <ul class="dropdown">
                @foreach ($menu_link->items as $menu_link)
                    @include('menus::public._item', ['menu_link' => $menu_link])
                @endforeach
            </ul>
    @endif
</li>





