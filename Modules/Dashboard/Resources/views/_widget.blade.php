<div class="kt-widget1__item">
    <div class="kt-widget1__info">
        <h3 class="kt-widget1__title">@lang($module . '::global.group_name')</h3>
        <span class="kt-widget1__desc">@lang($module . '::global.widget_description',[
            'link'=> !empty($link) ? $link : '<a href="'.route("admin.$module.index").'">here</a>'
           ])
        </span>
    </div>
    <span class="kt-widget1__number kt-font-brand">
        <span class="kt-badge kt-badge--{{!empty($color) ? $color : 'brand'}} kt-badge--lg">{{!empty($count) ? $count : ucfirst($module)::countAll()}}</span>
    </span>
</div>