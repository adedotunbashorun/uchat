@if(Route::has('admin.pages.show'))
{!! single_btn(route('admin.pages.show',$page_id)) !!}
@endif
@if(has_access('pages.edit'))
    {!! edit_btn(route('admin.pages.edit',$page_id)) !!}
@endif
@if(has_access('pages.destroy'))
    {!! delete_btn(route('ajax.pages.destroy',$page_id)) !!}
@endif