<li class="{{ Request::is($child->uri.'*') ? 'tg-active' : '' }}">
    <a href="{{ url($child->uri) }}">
        {{ $child->title }}
    </a>
</li>
