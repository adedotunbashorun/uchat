@if($group->shouldShowHeading())
    <li class="kt-menu__section">
            <h4 class="kt-menu__section-text">{{ $group->getName() }}</h4>
    </li>
@endif

@foreach($items as $item)
    {!! $item !!}
@endforeach
