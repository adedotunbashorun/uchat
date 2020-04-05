{{--
@if($group->shouldShowHeading())
    <li class="sidebar-group uppercase">{{ $group->getName() }}</li>
@endif
--}}

@foreach($items as $item)
    {!! $item !!}
@endforeach
