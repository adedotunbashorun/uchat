@if(Route::has('admin.users.show'))
{!! single_btn(route('admin.users.show',$id)) !!}
@endif
@if(has_access('users.edit'))
    {!! edit_btn(route('admin.users.edit',$id)) !!}
@endif
@if(has_access('users.destroy'))
    {!! delete_btn(route('ajax.users.destroy',$id)) !!}
@endif