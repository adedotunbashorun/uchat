<li class="kt-menu__item  kt-menu__item--submenu @if($active) kt-menu__item--active @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ $item->getUrl() }}" class="kt-menu__link kt-menu__toggle @if($item->hasItems())  @endif @if(count($appends) > 0) hasAppend @endif">
        <i class="kt-menu__link-icon {{ $item->getIcon() }}"></i>
        <span class="kt-menu__link-text">{{ $item->getName() }}</span>
        @if(count($items) > 0)                
        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">
                @foreach($items as $item)
                    {!! $item !!}
                @endforeach
            </ul>
        </div>
        @endif
        @foreach($badges as $badge)
            <span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger"> {!! $badge !!}</span></span>
        @endforeach

    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    {{-- @if(count($items) > 0)
        
    @endif --}}
</li>