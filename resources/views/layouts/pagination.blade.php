@if ($paginator->hasPages())
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!-- <a class="btn btn-info disabled"><span>«</span></a> -->
        @else
            <a class="btn btn-secondary float-left" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span>« Previous page</span></a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-secondary float-right" href="{{ $paginator->nextPageUrl() }}" rel="next"><span>Next page »</span></a>
        @else
            <!-- <a class="btn btn-info disabled"><span>»</span></a> -->
        @endif
@endif