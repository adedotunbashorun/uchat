@if(has_access('interests.show'))
    {!! edit_btn(route('admin.interests.show',$id)) !!}
@endif
@if(has_access('interests.edit'))
    {!! edit_btn(route('admin.interests.edit',$id)) !!}
@endif
@if(has_access('interests.destroy'))
    {!! delete_btn(route('admin.interests.destroy',$id)) !!}
@endif