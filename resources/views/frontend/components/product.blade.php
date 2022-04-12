<div class="product__item border border-[#D1D1D6] relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-3 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
    @if ($item->sale > 0 && !empty($item->sale_price))
    <span class="absolute top-3 left-3 text-white text-sm font-semibold z-10 bg-[#232323] px-3 py-[6px]">
        -{{ $item->sale }}%
    </span>
    @endif
    <span class="like w-6 h-6  flex items-center  justify-center absolute right-3 top-3 z-10">
        <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
        </svg>
        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
        </svg>
    </span>
    <a href="{{ route('home.single-products', ['slug' => $item->slug]) }}" class="flex items-center justify-center h-[280px] thumbnail" title="Sofa Modena 2 seater">
        <img src="{{ $item->image }}" alt="product__page.png" class="w-full h-full object-contain" />
    </a>


    <!-- <div class="flex items-center mt-[22px]">
        <div class="item">
            <svg width="68" height="32" viewbox="0 0 68 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="15.9707" y="0.414214" width="22" height="22" rx="3" transform="rotate(45 15.9707 0.414214)" fill="#BFBFBF" stroke="white" stroke-width="2" />
                <rect x="33.9062" y="0.414214" width="22" height="22" rx="3" transform="rotate(45 33.9062 0.414214)" fill="#868E96" stroke="white" stroke-width="2" />
                <rect x="51.8438" y="0.414214" width="22" height="22" rx="3" transform="rotate(45 51.8438 0.414214)" fill="#424242" stroke="white" stroke-width="2" />
            </svg>

        </div>

    </div> -->

    <a href="{{ route('home.single-products', ['slug' => $item->slug]) }}" class="content pt-4 mb-4" title="{{ $item->name }}">
        <h3 class="product__title text-[#212529] text-sm mb-1">{{ $item->name }}</h3>
        <p class="text-[#868E96] text-xs">{{ $item->description }}</p>
    </a>
    <div class="mt-auto flex items-center gap-1">
        <p class=" text-base font-semibold">{{ number_format($item->price, 0, '.', '.') }}</p>
    </div>
</div>
