@extends('frontend.master')
@section('main')
<div class="page__product flex flex-wrap items-start pt-[43px]">

    <div class="page__product--content w-full">
        <h1 class="text-[#212529] text-[32px]">
            Từ khóa tìm kiếm: {{ $q }}
        </h1>
        <div class="banner__product my-6">
        </div>
        <div class="page__product--group  grid gap-4 grid-cols-3">
        @foreach ($data as $item)
            @include('frontend.components.product')
        @endforeach
        </div>

        {{ $data->links('frontend.components.pagination') }}



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
