@extends('frontend.master')
@section('main')
    <div class="relative banner__home">
        <div class="relative pt-[38.334%] mt-[25px] overflow-hidden">
            <img src="{{ @$site_info->banner_home }}" alt="banner__home.jpg" class="w-full h-full object-cover absolute top-0 left-0 right-0 bottom-0">
        </div>
        <div class="banner__content p-[60px] absolute top-0 left-0 right-0  bottom-0 z-2">
            <h1 class="text-white font-black text-[40px] text-shadow">
                {!! @$site_info->title_banner_home !!}
            </h1>
        </div>
    </div>
    <div class="mt-[60px] category__product">
        <div class="flex items-center flex-wrap module__header">
            <h2 class="text-[#212529] font-semibold text-2xl">
                Danh mục sản phẩm
            </h2>

        </div>
        <div class="product__portfolio grid grid-cols-5 mt-6">
            @foreach ($category as $item)
            <a href="{{ route('home.category-product', ['slug' => $item->slug]) }}" class="flex items-center justify-center flex-col my-[43.75px] product__portfolio--item" title="Sofas">
                <div class="w-36 relative pt-[39.38%] mb-4 product__portfolio--image">
                    <img src="{{ $item->image }}" class="flex absolute top-0 left-0 right-0 bottom-0 w-full object-contain">
                </div>
                <h3 class="text-[#232323] text-base">
                    {{ $item->name }}
                </h3>
            </a>
            @endforeach

        </div>
    </div>
    @foreach ($categoryHome as $value)
    <div class="mt-[60px] sofa__product">
        <div class="flex items-center flex-wrap module__header">
            <h2 class="text-[#212529] font-semibold text-2xl">
                {{ $value->name }}
            </h2>

            <a href="{{ route('home.category-product', ['slug' => $value->slug]) }}" title="Xem thêm" class="ml-auto text-[#212529] text-sm hover:opacity-80">
                Xem thêm
            </a>

        </div>
        <div class="grid grid-cols-2 gap-4  sofa-import mt-4">
        <?php $product = App\Models\Products::where('categoryId', $value->categoryId)->where('status', 1)->orderBy('createdDateTime', 'DESC')->take(2)->get(); ?>
        @foreach ($product as $item)
            <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10 btn_like_product">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="{{ route('home.single-products', ['slug' => $item->slug]) }}" class="flex items-center product__thumbnail justify-center h-[260px]" title="Sofa Modena 2 seater">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-full object-contain" />
                </a>

                <a href="{{ route('home.single-products', ['slug' => $item->slug]) }}" class="content pt-4 mb-4" title="{{ $item->name }}">
                    <h3 class="product__title text-[#212529] text-sm mb-1">{{ $item->name }}</h3>
                    <p class="text-[#868E96] text-xs">{{ $item->description }}</p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">{{ number_format($item->price, 0, '.', '.') }}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @endforeach
    <!-- <div class="sofa__chapeau">
        <div class="flex items-center flex-wrap module__header">
            <h2 class="text-[#212529] font-semibold text-2xl">
                Sofa rời nhập khẩu châu Âu
            </h2>

            <a href="product.page.html" title="Xem thêm" class="ml-auto text-[#212529] text-sm hover:opacity-80">
                Xem thêm
            </a>

        </div>
        <div class="grid grid-cols-3 gap-4  sofa-import mt-4">
            <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="DetaiProduct.page.html" class="flex items-center product__thumbnail justify-center h-[260px]" title="Sofa Modena 2 seater">
                    <img src="images/product__1.png" alt="product__1.png" class="w-full h-full object-contain" />
                </a>

                <a href="DetaiProduct.page.html" class="content pt-4 mb-4" title="Sofa Modena 2 seater">
                    <h3 class="product__title text-[#212529] text-sm mb-1">Sofa Modena 2 seater</h3>
                    <p class="text-[#868E96] text-xs">Gỗ sồi, Gỗ keo, Thép không gỉ</p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">67.590.000</p>
                </div>
            </div>
            <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="DetaiProduct.page.html" class="flex items-center product__thumbnail justify-center h-[260px]" title="Sofa Modena 2 seater">
                    <img src="images/product__2.png" alt="product__2.png" class="w-full h-full object-contain" />
                </a>

                <a href="DetaiProduct.page.html" class="content pt-4 mb-4" title="Sofa Modena 2 seater">
                    <h3 class="product__title text-[#212529] text-sm mb-1">Sofa Modena 2 seater</h3>
                    <p class="text-[#868E96] text-xs">Gỗ sồi, Gỗ keo, Thép không gỉ</p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">67.590.000</p>
                </div>
            </div>
            <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="DetaiProduct.page.html" class="flex items-center product__thumbnail justify-center h-[260px]" title="Sofa Modena 2 seater">
                    <img src="images/product__3.png" alt="product__3.png" class="w-full h-full object-contain" />
                </a>

                <a href="DetaiProduct.page.html" class="content pt-4 mb-4" title="Sofa Modena 2 seater">
                    <h3 class="product__title text-[#212529] text-sm mb-1">Sofa Modena 2 seater</h3>
                    <p class="text-[#868E96] text-xs">Gỗ sồi, Gỗ keo, Thép không gỉ</p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">67.590.000</p>
                </div>
            </div>
        </div>

    </div>
    <div class="section__carpet">
        <div class="flex items-center flex-wrap module__header">
            <h2 class="text-[#212529] font-semibold text-2xl">
                Thảm
            </h2>

            <a href="product.page.html" title="Xem thêm" class="ml-auto text-[#212529] text-sm hover:opacity-80">
                Xem thêm
            </a>

        </div>
        <div class="grid grid-cols-2 gap-4 mt-4 carpet ">
            <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="DetaiProduct.page.html" class="flex items-center product__thumbnail justify-center h-[260px]" title="Thảm sợi ngắn TN0001">
                    <img src="images/carpet__1.png" alt="carpet__1.png" class="w-full h-full object-contain" />
                </a>

                <a href="DetaiProduct.page.html" class="content pt-4 mb-4" title="Thảm sợi ngắn TN0001">
                    <h3 class="product__title text-[#212529] text-sm mb-1">Thảm sợi ngắn TN0001</h3>
                    <p class="text-[#868E96] text-xs">Dạ, Sợi tự nhiên, Sợi tổng hợp </p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">7.590.000</p>
                </div>
            </div>
            <div class="product__item mb-20 relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-4 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-6 top-6 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <a href="DetaiProduct.page.html" class="flex items-center product__thumbnail justify-center h-[260px]" title="Thảm lông xù TX0001">
                    <img src="images/carpet__2.png" alt="carpet__2.png" class="w-full h-full object-contain" />
                </a>

                <a href="DetaiProduct.page.html" class="content pt-4 mb-4" title="Thảm lông xù TX0001">
                    <h3 class="product__title text-[#212529] text-sm mb-1">Thảm lông xù TX0001</h3>
                    <p class="text-[#868E96] text-xs">Dạ, Sợi tự nhiên, Sợi tổng hợp </p>
                </a>
                <div class="mt-auto flex items-center gap-1">

                    <p class=" text-sm">7.590.000</p>
                </div>
            </div>
        </div>

    </div> -->

    <div class="album__container flex items-start flex-wrap mb-[140px]">
        <div class="flex-shrink-0 max-w-[389px] w-full">
            <h2 class="text-[#232323] font-semibold text-[32px]">
                Bộ sưu tập nội thất từ các nhà thiết kế
            </h2>
            <a class="transition-all hover:transition-all hover:bg-black text-base text-white mt-10 flex items-center justify-center max-w-[280px] w-full h-10 bg-[#232323]" href="{{ route('home.collection') }}" title="Xem thêm">Xem thêm</a>
        </div>
        <div class="slide__album w-full pl-4">
            <div class="album ">
                @foreach ($collection as $item)
                <div class="album__item px-2">
                    <a class="flex album__box relative overflow-hidden">
                        <div class="album__image h-[400px] w-full">
                            <img src="{{ $item->image }}" alt="1.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="album__footer flex items-center w-full text-white bg-[rgba(26,26,28,0.4)] absolute bottom-0 left-0 right-0 py-5 px-6 z-1">
                            <h3 class="text-lg font-bold uppercase ">
                                {{ $item->name }}
                            </h3>
                            <span class="album__total ml-auto text-sm ">
                            <?php $list = json_decode($item->list_product) ?>
                                {{ count($list) }} sản phẩm
                            </span>
                        </div>
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
                $('.album').slick({
                    dots: false,
                    arrow: true,
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    }]
                })
            }
            album()
        })
    </script>
@endsection
