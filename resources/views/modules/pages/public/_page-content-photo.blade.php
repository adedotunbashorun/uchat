@if($page->image !='')
    <img src="{{asset($page->present()->thumbSrc())}}" width="280" alt="" class="pull-left about">
@endif