<li class="kt-menu__item  kt-menu__item--submenu @if($active) is-active @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ $item->getUrl() }}" class="kt-menu__link kt-menu__toggle @if($item->hasItems())  @endif @if(count($appends) > 0) hasAppend @endif">
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
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    </div>
    @endif
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-layers"></i><span class="kt-menu__link-text">Resources</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Resources</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Layout inner</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Timesheet</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Payroll</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Contacts</span></a></li>
        </ul>
    </div>
</li>