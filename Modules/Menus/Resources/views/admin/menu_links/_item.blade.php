<li id="list_{{ $menu_link->id }}" class="" role="menuitem">
    <div class="box">
        <div class="pull-left">
            @if ($menu_link->items->count())
                <a href="#" class="caret-h disclose fa fa-caret-down"></a>
            @endif
            <a href="{{ route('admin.menus.menu_links.edit',[$menu_link->menu->id,$menu_link->id]) }}" class="link">
                {{ $menu_link->title }}
                {!! status_label($menu_link->status) !!}
            </a>
        </div>
        <div class="pull-right">
            <div class="btn-group">
                <a href="{{ route('admin.menus.menu_links.edit',[$menu_link->menu->id,$menu_link->id]) }}" class="btn btn-info btn-sm btn-icon"><i class="fa fa-edit"></i> </a>
                <a href="{{ route('ajax.menu_links.destroy',$menu_link->id) }}" class="btn btn-danger btn-sm btn-icon delete-me" data-confirm="{{trans('core::global.delete_record')}}"><i class="fa fa-trash"></i> </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    @if ($menu_link->items->count())
        <ol>
            @foreach ($menu_link->items as $menu_link)
                @include('menus::admin.menu_links._item', ['menu_link' => $menu_link])
            @endforeach
        </ol>
    @endif
</li>
