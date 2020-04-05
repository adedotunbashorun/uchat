@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{route("admin.$module.index")}}"
       class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.name')</a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
        @if(empty($model))
            @Lang($module . '::global.new')
        @else
            @Lang($module . '::global.edit')
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
            <a href="#tab_2" data-toggle="tab" class="nav-link">
                Content </a>
        </li>
        <li class="nav-item">
            <a href="#tab_3" data-toggle="tab" class="nav-link">
                Meta </a>
        </li>
        <li class="nav-item">
            <a href="#tab_4" data-toggle="tab" class="nav-link">
                File </a>
        </li>
        <li class="nav-item">
            <a href="#tab_5" data-toggle="tab" class="nav-link">
                Option </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
                <div class="col-md-6">
                    {!! form_row($form->title) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->slug) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->tagline) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->parent_id) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->status) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_2">
            {!! form_row($form->body) !!}
        </div>
        <div class="tab-pane" id="tab_3">
            <div class="row">
                <div class="col-md-6">
                    {!! form_row($form->meta_title) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->meta_keywords) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->meta_description) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_4">
            <div class="row">
                <div class="col-md-6">
                    {!! form_row($form->image) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->css) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->js) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->icon) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_5">
            <div class="row">
                <div class="col-md-6">
                    {!! form_row($form->module) !!}
                </div>
                <div class="col-md-6">
                    {!! form_row($form->template) !!}
                </div>
                @if(!$model->id)
                    <div class="col-md-6">
                        {!! form_row($form->add_to_menu,['attr'=>['name'=>'menus[]']]) !!}
                    </div>
                @endif
                <div class="col-md-12">
                    {!! form_row($form->is_home) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}
