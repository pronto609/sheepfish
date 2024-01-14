<ul>
    @if(!$paginator->onFirstPage())
        <li style="display: inline">
            <a href="{{ $paginator->previousPageUrl() }}"><-</a>
        </li>
    @endif
    @for($i = 1; $i <= $paginator->lastPage(); $i++)
        <li style="display: inline">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    @if(!$paginator->onLastPage())
    <li style="display: inline">
        <a href="{{ $paginator->nextPageUrl() }}">-></a>
    </li>
    @endif
</ul>
