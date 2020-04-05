@if(has_access('categories.show'))
    {!! edit_btn(route('admin.categories.show',$id)) !!}
@endif
@if(has_access('categories.edit'))
    {!! edit_btn(route('admin.categories.edit',$id)) !!}
@endif
@if(has_access('categories.destroy'))
    {!! delete_btn(route('admin.categories.destroy',$id)) !!}
@endif