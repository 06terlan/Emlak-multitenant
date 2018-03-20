@if ($paginator->hasPages())
    <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item disabled"><a class="page-link"><span>«</span></a></li>
            @else
                <li class="paginate_button page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span>«</span></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginate_button page-item disabled"><a class="page-link"><span>{{ $element }}</span></a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active"><a class="page-link"><span>{{ $page }}</span></a></li>
                        @else
                            <li class="paginate_button page-item"><a class="page-link" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><span>»</span></a></li>
            @else
                <li class="paginate_button page-item disabled"><a class="page-link"><span>»</span></a></li>
            @endif
        </ul>
    </div>
@endif