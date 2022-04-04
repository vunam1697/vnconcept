@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="pagination-items pagination__prev pagination__no">
        <a href="#" class="pagination-item-link text__black--900 ">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1153_2177)">
                    <g opacity="0.6">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16.9414V8.94141H9V12.9414V16.9414H8ZM9 12.9414L15 8.94141V16.9414L9 12.9414Z" fill="#212529" />
                    </g>
                </g>
                <defs>
                    <clipPath id="clip0_1153_2177">
                        <rect width="24" height="24" fill="white" transform="translate(0 0.941406)" />
                    </clipPath>
                </defs>
            </svg>

        </a>
    </li>
    <li class="pagination-item pagination__prev pagination__no">
        <a href="#" class="pagination-item-link text__black--900">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.6">
                    <path d="M9 12.9414L15 8.94141V16.9414L9 12.9414Z" fill="#212529" />
                </g>
            </svg>

        </a>
    </li>
    @else
    <li class="pagination-items pagination__prev">
        <a href="{{ $paginator->toArray()['first_page_url']  }}" class="pagination-item-link text__black--900 ">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1153_2177)">
                    <g opacity="0.6">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16.9414V8.94141H9V12.9414V16.9414H8ZM9 12.9414L15 8.94141V16.9414L9 12.9414Z" fill="#212529" />
                    </g>
                </g>
                <defs>
                    <clipPath id="clip0_1153_2177">
                        <rect width="24" height="24" fill="white" transform="translate(0 0.941406)" />
                    </clipPath>
                </defs>
            </svg>

        </a>
    </li>
    <li class="pagination-item pagination__prev">
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-item-link text__black--900">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.6">
                    <path d="M9 12.9414L15 8.94141V16.9414L9 12.9414Z" fill="#212529" />
                </g>
            </svg>

        </a>
    </li>
    @endif


    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="pagination-item disabled"><span>{{ $element }}</span></li>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="pagination-item active">
                        <a class="pagination-item-link text__black--900">{{ $page }}</a>
                    </li>
                @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                    <li class="pagination-item">
                        <a href="{{ $url }}" class="pagination-item-link text__black--900">{{ $page }}</a>
                    </li>
                @elseif ($page == $paginator->lastPage() - 1 || $page == $paginator->lastPage() - 2 || $paginator->currentPage())
                    <li class="pagination-item">
                        <a href="{{ $url }}" class="pagination-item-link text__black--900">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="pagination-item pagination__next">
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-item-link text__black--900 ">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1153_2223)">
                    <path d="M15 12.9414L9 16.9414V8.94141L15 12.9414Z" fill="#212529" />
                </g>
                <defs>
                    <clipPath id="clip0_1153_2223">
                        <rect width="24" height="24" fill="white" transform="translate(0 0.941406)" />
                    </clipPath>
                </defs>
            </svg>

        </a>
    </li>
    <li class="pagination-item  pagination__next--all">
        <a href="{{ $paginator->toArray()['last_page_url'] }}" class="pagination-item-link text__black--900">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1153_2228)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12.9414L8 8.94141V16.9414L14 12.9414ZM14 12.9414V16.9414H15V8.94141H14V12.9414Z" fill="#212529" />
                </g>
                <defs>
                    <clipPath id="clip0_1153_2228">
                        <rect width="24" height="24" fill="white" transform="translate(0 0.941406)" />
                    </clipPath>
                </defs>
            </svg>

        </a>
    </li>
    @else
    <li class="pagination-item pagination__next pagination__no">
        <a href="#" class="pagination-item-link text__black--900 ">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1153_2223)">
                    <path d="M15 12.9414L9 16.9414V8.94141L15 12.9414Z" fill="#212529" />
                </g>
                <defs>
                    <clipPath id="clip0_1153_2223">
                        <rect width="24" height="24" fill="white" transform="translate(0 0.941406)" />
                    </clipPath>
                </defs>
            </svg>

        </a>
    </li>
    <li class="pagination-item  pagination__next--all pagination__no">
        <a href="#" class="pagination-item-link text__black--900">
            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1153_2228)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12.9414L8 8.94141V16.9414L14 12.9414ZM14 12.9414V16.9414H15V8.94141H14V12.9414Z" fill="#212529" />
                </g>
                <defs>
                    <clipPath id="clip0_1153_2228">
                        <rect width="24" height="24" fill="white" transform="translate(0 0.941406)" />
                    </clipPath>
                </defs>
            </svg>

        </a>
    </li>
    @endif
@endif
