<div class="kt-portlet__head kt-portlet__head--lg">
    @include('core::admin._porlet-caption', ['module' => $module])
    <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
            @if(empty(config($module.'.hide_add_btn')))
                <div class="kt-portlet__head-actions">
                    @if(isset($type))
                        @include('core::admin._button-'.$type, ['module' => $module,'caption'=>$caption])
                        @if(has_access($module.'.print'))
                            @include('core::admin._button-print', ['module' => $module])
                        @endif
                        @if(has_access($module.'.excel'))
                            @include('core::admin._button-excel', ['module' => $module])
                        @endif
                    @else
                        @include('core::admin._button-create', ['module' => $module])
                    @endif
                </div>
            @endif
            {{-- @include('core::admin._button-fullscreen') --}}
        </div>
    </div>
</div>