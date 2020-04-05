@if ($menu_links)
    <ol class="sortable-page">
        @foreach ($menu_links as $menu_link)
            @include('menus::admin.menu_links._item')
        @endforeach
    </ol>
@endif
<script>
    var ns = $('ol.sortable-page').nestedSortable({
        forcePlaceholderSize: true,
        handle: 'div',
        helper:	'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 25,
        tolerance: 'pointer',
        toleranceElement: '> div',
        maxLevels: 4,
        isTree: true,
        expandOnHover: 700,
        startCollapsed: true
    });
    $('.disclose').on('click', function(e) {
        e.preventDefault();
        $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
        $(this).toggleClass('fa-caret-down').toggleClass('fa-caret-up');

    });

    $(".delete-me").click(function () {
        if (confirm($(this).attr('data-confirm'))) {
            $.ajax({
                url: $(this).attr('href'),
                type: 'DELETE',
                success: function (data) {
                    document.location.href = '';
                },
                data: {_token: '{{csrf_token()}}'}
            })
        }
        return false;
    });
</script>
