@if($history_items = History::latest(6, ['historable', 'user'], true))
    <div class="kt-notification">
        @if(count($history_items))
            @foreach($history_items as $history)
                <a href="{{ $history->href }}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="kt-font-{{$history->present()->iconBgColor}} fa {{$history->icon_class}}"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title">
                            {{ $history->user_name }}
                            {{ $history->action }}
                            {{ $history->entity}}
                            {{ str_singular($history->historable_table)}}:
                            {{ $history->title }}
                        </div>
                        <div class="kt-notification__item-time">
                            {{ $history->created_at }}
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="alert alert-outline-danger fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">No activities yet</div>
            </div>
        @endif
    </div>
@endif