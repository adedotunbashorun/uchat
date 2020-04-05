<div class="kt-portlet__head-label">
    {{--<span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon-signs-1"></i>
    </span>--}}
    <h3 class="kt-portlet__head-title">
        @if(isset($caption))
            @Lang($module . '::global.'.$caption)
        @else
            @Lang($module . '::global.index')
        @endif
    </h3>
</div>