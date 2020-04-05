@if(has_access('banners.show'))
    {!! edit_btn(route('admin.banners.show',$id)) !!}
@endif
@if(has_access('banners.edit'))
    {!! edit_btn(route('admin.banners.edit',$id)) !!}
@endif
@if(has_access('banners.destroy'))
    {!! delete_btn(route('admin.banners.destroy',$id)) !!}
@endif