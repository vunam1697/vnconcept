@if ($paginator->hasPages())
    <!-- Pagination -->


        @if ($paginator->onFirstPage())

        @else
            <li class="addon__pagination-item">
                @if (!empty($q))
                <?php $page_next = $paginator->currentPage() - 1; ?>
                <a href="{{ route('home.search', ['q' => $q, 'page' => $page_next]) }}" class="addon__pagination-item-link">
                    <img src="{{ url('/uploads/images/icons/icon__prev.png') }}" alt="icon__prev.png">
                </a>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" class="addon__pagination-item-link">
                    <img src="{{ url('/uploads/images/icons/icon__prev.png') }}" alt="icon__prev.png">
                </a>
                @endif
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="addon__pagination-item active">
                            @if (!empty($q))
                            <a href="{{ route('home.search', ['q' => $q, 'page' => $page]) }}" class="addon__pagination-item-link">
                                {{ $page }}
                            </a>
                            @else
                            <a href="{{ $url }}" class="addon__pagination-item-link">
                                {{ $page }}
                            </a>
                            @endif
                        </li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <li class="addon__pagination-item">
                            @if (!empty($q))
                            <a href="{{ route('home.search', ['q' => $q, 'page' => $page]) }}" class="addon__pagination-item-link">
                                {{ $page }}
                            </a>
                            @else
                            <a href="{{ $url }}" class="addon__pagination-item-link">
                                {{ $page }}
                            </a>
                            @endif
                        </li>
                    @elseif ($page == $paginator->lastPage() - 1 || $page == $paginator->lastPage() - 2 || $paginator->currentPage())
                        <li class="addon__pagination-item">
                            @if (!empty($q))
                            <a href="{{ route('home.search', ['q' => $q, 'page' => $page]) }}" class="addon__pagination-item-link">
                                {{ $page }}
                            </a>
                            @else
                            <a href="{{ $url }}" class="addon__pagination-item-link">
                                {{ $page }}
                            </a>
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="addon__pagination-item">
                @if (!empty($q))
                <?php $page_next = $paginator->currentPage() + 1 ?>
                <a href="{{ route('home.search', ['q' => $q, 'page' => $page_next]) }}" class="addon__pagination-item-link addon__next">
                    <img src="{{ url('/uploads/images/icons/icon__prev.png') }}" alt="icon__prev.png">
                </a>
                @else
                <a href="{{ $paginator->nextPageUrl() }}" class="addon__pagination-item-link addon__next">
                    <img src="{{ url('/uploads/images/icons/icon__prev.png') }}" alt="icon__prev.png">
                </a>
                @endif
            </li>
        @endif
    <!-- Pagination -->
@endif
