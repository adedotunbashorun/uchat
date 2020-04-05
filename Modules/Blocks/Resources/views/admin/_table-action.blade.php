@if(has_access('blocks.show'))
    {!! edit_btn(route('admin.blocks.show',$id)) !!}
@endif
@if(has_access('blocks.edit'))
    {!! edit_btn(route('admin.blocks.edit',$id)) !!}
@endif
@if(has_access('blocks.destroy'))
    {!! delete_btn(route('admin.blocks.destroy',$id)) !!}
@endif