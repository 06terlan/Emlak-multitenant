@if ($paginator->hasPages())
    <div class="btn-group">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn btn-info disabled"><span>«</span></a>
        @else
            <a class="btn btn-info" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span>«</span></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="btn btn-info disabled"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="btn btn-info active"><span>{{ $page }}</span></a>
                    @else
                        <a class="btn btn-info" href="{{ $url }}"><span>{{ $page }}</span></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-info" href="{{ $paginator->nextPageUrl() }}" rel="next"><span>»</span></a>
        @else
            <a class="btn btn-info disabled"><span>»</span></a>
        @endif
    </div>
@endif