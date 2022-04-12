@extends('frontend.master')
 @section('main')
 <div class="page__product flex flex-wrap items-start pt-[43px]">
    <div class="page__product--sidebar flex-shrink-0 max-w-[187px] w-full grid gap-4 mb-4">
    @foreach ($filter as $key => $item)
        <div class="sidebar__box border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    {{ $item->name }}
                </h3>
                <span class="sidebar__icon ml-auto w-[18px] h-[18px]">
                    <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.30859 10.2344H12.6914C13.0518 10.2344 13.3154 10.0234 13.3154 9.67188C13.3154 9.31152 13.0693 9.10059 12.6914 9.10059H5.30859C4.92188 9.10059 4.67578 9.31152 4.67578 9.67188C4.67578 10.0234 4.93945 10.2344 5.30859 10.2344Z" fill="#424242" />
                    </svg>
                    <svg class="" width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.16797 9.66309C5.16797 9.97949 5.41406 10.2168 5.74805 10.2168H8.42871V12.8975C8.42871 13.2314 8.66602 13.4688 8.98242 13.4688C9.3252 13.4688 9.5625 13.2402 9.5625 12.8975V10.2168H12.2432C12.5771 10.2168 12.8145 9.97949 12.8145 9.66309C12.8145 9.32031 12.5859 9.08301 12.2432 9.08301H9.5625V6.40234C9.5625 6.05957 9.3252 5.82227 8.98242 5.82227C8.66602 5.82227 8.42871 6.06836 8.42871 6.40234V9.08301H5.74805C5.40527 9.08301 5.16797 9.32031 5.16797 9.66309Z" fill="#424242" />
                    </svg>

                </span>
            </div>

            <?php $detail_filter = json_decode(@$item->content) ?>
            @if (!empty($detail_filter))
            <ul class="sidebar__body grid gap-y-3 mt-4">
                @foreach ($detail_filter->filter as $value)
                <?php
                    $param = [];
                    if($item->type == 'price') {
                        $param = [
                            $value->min_value,
                            $value->max_value
                        ];
                    }
                ?>
                <li class="sidebar__item">
                    <label for="checkbox__5" class="sidebar__link block text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="{{ $value->name }}">
                        @if($item->type == 'price')
                        <input type="checkbox" id="checkbox__1" class="filter-check-box" name="price[]" data-type="price" value="{{ !empty($param) ? json_encode($param) : '' }}">
                        @elseif ($item->type == 'color')
                        <input type="checkbox" id="checkbox__2" class="filter-check-box" name="color[]" data-type="color" value="{{ $value->value }}">
                        @elseif ($item->type == 'collection')
                        <input type="checkbox" id="checkbox__3" class="filter-check-box" name="collection[]" data-type="collection" value="{{ $value->value }}">
                        @elseif ($item->type == 'designer')
                        <input type="checkbox" id="checkbox__4" class="filter-check-box" name="designer[]" data-type="designer" value="{{ $value->value }}">
                        @else
                        <input type="checkbox" id="checkbox__5" class="filter-check-box" name="fabric_material[]" data-type="fabric_material" value="{{ $value->value }}">
                        @endif
                        <span>
                            {{ $value->name }}
                        </span>
                    </label>
                </li>
                @endforeach
            </ul>

            @if(isset($cate_detail))
            <input type="hidden" value="{{$cate_detail->categoryId}}" id="category_base">
            @endif
            @endif
        </div>
    @endforeach
    </div>
    <div class="page__product--content w-full">
        <h1 class="text-[#212529] text-[32px]">
            @if (!empty($cate_detail))
            {{ $cate_detail->name }}
            @else
            Sản phẩm
            @endif
        </h1>
        <p class="text-[#424242] text-base mt-6">
            @if (!empty($cate_detail))
            {{ $cate_detail->content }}
            @endif
        </p>
        @if (!empty($cate_detail->banner))
        <div class="banner__product my-6">
            <img src="{{ $cate_detail->banner }}" alt="banner__product.png w-full">
        </div>
        @endif
        <div class="products__content">
            <div class="page__product--group  grid gap-4 grid-cols-3">
            @foreach ($data as $item)
                @include('frontend.components.product')
            @endforeach
            </div>

            {{ $data->links('frontend.components.pagination') }}
        </div>

        <div class="rooms-same-type mt-10 border-t border-[#EEEEEE] mb-20 pt-10">
            <h2 class="text-2xl  text-[#212529] font-semibold">
                Ứng dụng trong bài trí phòng
            </h2>
            <div class="same-type mt-6">
                <div class="same-slide">
                    @foreach ($rooms as $item)
                    <div class="item px-2">
                        <a href="{{ route('home.single-rooms', ['slug' => $item->slug]) }}" class="same-box block" title="{{ $item->name }}">
                            <div class="h-[392px] overflow-hidden">
                                <img src="{{ $item->image }}" alt="sameType-1.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                {{ $item->name }}
                            </h3>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            function album() {
                $('.same-slide').slick({
                    dots: false,
                    arrow: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    responsive: [{
                        breakpoint: 991.98,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 400.98,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }]
                })
            }
            album()
        })
    </script>
@endsection

