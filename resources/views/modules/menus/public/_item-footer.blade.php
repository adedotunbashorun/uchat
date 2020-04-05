<li class="{{ request()->is($menu_link->href.'*') ? 'current' : '' }}">
    <a href="{{ url($menu_link->href) }}" @if($menu_link->target) target="{{ $menu_link->target }}" @endif>
        {{ $menu_link->title }}
    </a>
</li>
