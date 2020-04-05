@if(has_access('photos.show'))
    {!! edit_btn(route('admin.photos.show',$id)) !!}
@endif
@if(has_access('photos.edit'))
    {!! edit_btn(route('admin.photos.edit',$id)) !!}
@endif
@if(has_access('photos.destroy'))
    {!! delete_btn(route('admin.photos.destroy',$id)) !!}
@endif