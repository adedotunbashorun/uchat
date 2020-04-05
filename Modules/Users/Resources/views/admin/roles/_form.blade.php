@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{route("admin.$module.index")}}"
       class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.roles.group_name')</a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
        @if(empty($id))
            @Lang($module . '::global.roles.new')
        @else
            @Lang($module . '::global.roles.edit')
        @endif
    </a>
@stop
{!! form_start($form,['class'=>'']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    <ul class="nav nav-tabs nav-tabs-line-2x nav-tabs-line nav-tabs-line-primary">
        <li class="nav-item">
            <a href="#tab_1" data-toggle="tab" class="nav-link active">
                Basic </a>
        </li>
        <li class="nav-item">
            <a href="#tab_3" data-toggle="tab" class="nav-link">
                Permissions </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
                <div class="col-md-12">
                    {!! form_row($form->name) !!}
                </div>
                <div class="col-md-12">
                    {!! form_row($form->slug) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_3">
            @if(!isset($id))
                @include('users::admin._permissions_create')
            @else
                @include('users::admin._permissions', ['model' => $model])
            @endif
        </div>

    </div>
</div>
{!! form_rest($form) !!}
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}