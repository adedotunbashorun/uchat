<li class="@if($active) is-active @endif">
    <a href="{{ $item->getUrl() }}" class="@if($item->hasItems())  @endif @if(count($appends) > 0) hasAppend @endif">
        <span class="icon">
            <i class="{{ $item->getIcon() }}"></i>
        </span>
        {{ $item->getName() }}
        @if(count($items) > 0)
            <span class="arrow"></span>
            @endif
        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="sub-menu">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
