@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-number" aria-disabled="true" aria-label="@lang('pagination.previous')">

                    <span aria-hidden="true" class="fa fa-angle-left" aria-hidden="true"></span>
                </li>
            @else
                <li class="page-number">
                    <a  class="page-number" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span class="fa fa-angle-left" ></span></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled page-number" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-number" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="page-number"><a class="page-number" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-number">
                    <a class="page-number" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span class="fa fa-angle-right" aria-hidden="true"></span></a>
                </li>
            @else
                <li class="disabled page-number" aria-disabled="true" aria-label="@lang('pagination.next')">
{{--                    <span aria-hidden="true">&rsaquo;</span>--}}
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
