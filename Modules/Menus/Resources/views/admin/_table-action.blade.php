
{!! single_btn(route('admin.menus.menu_links.index',$id)) !!}

@if(has_access('menus.edit'))
    {!! edit_btn(route('admin.menus.edit',$id)) !!}
@endif
@if(has_access('menus.destroy'))
    {!! delete_btn(route('admin.menus.destroy',$id)) !!}
@endif