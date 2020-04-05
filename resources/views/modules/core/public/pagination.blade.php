@if ($paginator->lastPage() > 1)
    <nav class="tg-pagination">
    <ul>
        <li class="{{ ($paginator->currentPage() == 1) ? ' ' : ' tg-prevpage' }}">
            <a href="{{ $paginator->url(1) }}"><i class="fa fa-angle-left"></i></a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' tg-active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? '' : ' tg-nextpage' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" ><i class="fa fa-angle-right"></i></a>
        </li>
    </ul>
    </nav>
@endif