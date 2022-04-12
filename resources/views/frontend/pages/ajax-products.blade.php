<div class="page__product--group  grid gap-4 grid-cols-3">
@foreach ($data as $item)
    @include('frontend.components.product')
@endforeach
</div>

<!-- {{ $data->links('frontend.components.pagination') }} -->
@if($data->lastpage() > 1)
    <ul class="pagination flex my-10">
        @if ($data->onFirstPage())
            <li class="pagination-item pagination__prev pagination__no">
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
            <li class="pagination-item pagination__prev">
                <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">
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
                <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">
                    <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.6">
                            <path d="M9 12.9414L15 8.94141V16.9414L9 12.9414Z" fill="#212529" />
                        </g>
                    </svg>
                </a>
            </li>
        @endif

        @if($data->currentPage() > 4)
            <li class="pagination-item">
                ...
            </li>
        @endif
        @foreach(range(1, $data->lastPage()) as $i)
            @if($i >= $data->currentPage() - 2 && $i <= $data->currentPage() + 2)
                @if ($i == $data->currentPage())
                    <li class="pagination-item active">
                        <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">{{ $i }}</a>
                    </li>
                @else
                    <li class="pagination-item">
                        <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">{{ $i }}</a>
                    </li>
                @endif
            @endif
        @endforeach
        @if($data->currentPage() < $data->lastPage() - 3)
            <li class="pagination-item">
                ...
            </li>
        @endif
        @if($data->currentPage() < $data->lastPage() - 2)
            <li class="pagination-item">
                <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">{{ $i }}</a>
            </li>
        @endif
        @if ($data->hasMorePages())
            <li class="pagination-item pagination__next">
                <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">
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
                <a data-href="{{route('home.load-more-ajax')}}" data-page="{{$i}}" class="pagination-item-link text__black--900 page-product">
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
    </ul>
@endif