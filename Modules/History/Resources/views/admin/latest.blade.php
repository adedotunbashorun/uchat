<div class="portlet light">
    <div class="portlet-title">
        <div class="caption caption-md">
                        <span class="caption-subject theme-font-color bold">
                            Latest changes
                        </span>
        </div>
        <div class="actions">
            @include('core::admin._button-fullscreen')
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th> Title</th>
                    <th> Module</th>
                    <th> Action</th>
                    <th> User</th>
                </tr>
                </thead>
                <tbody>
                    @if($history_items = History::latest(25, ['historable', 'user'], true))
                        @foreach($history_items as $history)
                        <tr>
                            <td>{{ $history->created_at}}</td>
                            <td>
                                <a href="{{ $history->href }}">{{ $history->title }}</a>
                            </td>
                            <td>{{ $history->historable_table }}</td>
                            <td>
                                <span class="fa {{ $history->icon_class }}"></span> {{ $history->action }}
                            </td>
                            <td>{{ $history->user_name }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>