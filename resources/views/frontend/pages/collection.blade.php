@extends('frontend.master')
@section('main')
    <div class="page__rooms pt-[70px] mb-11">
        <h1 class="text-center text-[40px] text-[#212529]">
            {{ $data->name }}
        </h1>
        <p class="text-center text-[#212529] text-lg max-w-[794px] w-full mx-auto mt-[14px]">
            {{ $data->content }}
        </p>
    </div>

    <div class="rooms__one">
        <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
            <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                </svg>
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                </svg>
            </span>
            <a href="{{ route('home.single-rooms', ['slug' => $data->slug]) }}" class="flex product__thumbnail items-center justify-center h-[720px]" title="{{ $data->name }}">
                <img src="{{ $data->image }}" alt="product__sale.png" class="w-full h-full object-contain" />
            </a>

            <a href="{{ route('home.single-rooms', ['slug' => $data->slug]) }}" class="content pt-4 mb-4" title="{{ $data->name }}">
                <h3 class="product__title text-[#212529] text-sm mb-1">{{ $data->name }}</h3>
                <p class="text-[#868E96] text-xs">{{ $description }}</p>
            </a>
            <div class="mt-auto flex items-center gap-1">
                <!-- <p class="text-sm text-[#868E96] line-through">
                    267.590.000 đ
                </p> -->

                <p class=" text-sm">{{ number_format($data->price, 0, '.', '.') }} đ</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mt-4 carpet ">
        @foreach ($product as $item)
        <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
            <form action="{{ route('home.post-add-cart') }}" method="POST">
            @csrf
                <input type="hidden" name="id_product" value="{{ $item->id }}">
                <input type="hidden" name="price" value="{{ @$item->price }}">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="{{ route('home.single-products', ['slug' => $item->slug]) }}" class="flex items-center product__thumbnail justify-center h-[260px]" title="{{ $item->name }}">
                    <img src="{{ $item->image }}" alt="sofa-import-1.png" class="w-full h-full object-contain" />
                </a>

                <div class="flex items-center mt-[22px]">

                    <button type="submit" class="ml-auto text-[#212529] text-xs border border-[#BFBFBF] py-[5px] px-2 hover:bg-black hover:text-white">
                        Thêm vào giỏ
                    </button>
                </div>
                <a href="{{ route('home.single-products', ['slug' => $item->slug]) }}" class="content pt-4 mb-4" title="{{ $item->name }}">
                    <h3 class="product__title text-[#212529] text-sm mb-1">{{ $item->name }}</h3>
                    <p class="text-[#868E96] text-xs">{{ $item->description }}</p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">{{ number_format($item->price, 0, '.', '.') }}</p>
                </div>
            </form>
        </div>
        @endforeach
    </div>
    <form action="{{ route('home.post-add-cart-more') }}" method="POST">
    @csrf
        <input type="hidden" name="id_product" value="{{ json_encode($productId) }}">
        <div class="grid gap-4 max-w-[400px] w-full mx-auto border-t border-[#C4C4C4] text-center pt-4">
            <!-- <p class="text-[#212529] text-lg">
                Giá niêm yết: 54.000.000đ
            </p> -->

            <span class="text-[#212529] text-lg font-bold">
                Giá cả bộ: {{ number_format($data->price, 0, '.', '.') }}đ
            </span>
            <button type="submit" class="w-full hover:opacity-75 max-w-[287px] py-3 mx-auto text-white text-base flex items-center justify-center bg-[#232323]">
                Mua trọn bộ
            </button>
        </div>
    </form>

    <div class="rooms-same-type mt-[121px] mb-[98px]">
        <h2 class="text-center text-[40px] text-[#212529]">
            Bộ sưu tập cùng loại
        </h2>
        <div class="same-type mt-11">
            <div class="same-slide">
                @foreach ($collection_same as $item)
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
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            function album() {
                $('.same-slide').slick({
                    dots: false,
                    arrow: true,
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    responsive: [{
                        breakpoint: 991.98,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 767.98,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 479.98,
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
