@extends('frontend.master')
 @section('main')
 <div class="page__product flex flex-wrap items-start pt-[43px]">
    <div class="page__product--sidebar flex-shrink-0 max-w-[187px] w-full grid gap-4 mb-4">
        <div class="sidebar__box active border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    Sofa da thật
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
            <ul class="sidebar__body grid gap-y-3 mt-4">
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Sofa đơn">
                        Sofa đơn
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Sofa đôi">
                        Sofa đôi
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Sofa 2 mảnh">
                        Sofa 2 mảnh
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Đôn">
                        Đôn
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar__box active border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    Giá
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
            <ul class="sidebar__body grid gap-y-3 mt-4">
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Từ thấp đến cao">
                        Từ thấp đến cao
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Từ cao đến thấp">
                        Từ cao đến thấp
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="1 triệu - 5 triệu">
                        1 triệu - 5 triệu
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="5 triệu - 10 triệu">
                        5 triệu - 10 triệu
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar__box border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    Màu sắc
                </h3>
                <span class="sidebar__icon ml-auto w-[18px] h-[18px]">
                    <svg class="" width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.30859 10.2344H12.6914C13.0518 10.2344 13.3154 10.0234 13.3154 9.67188C13.3154 9.31152 13.0693 9.10059 12.6914 9.10059H5.30859C4.92188 9.10059 4.67578 9.31152 4.67578 9.67188C4.67578 10.0234 4.93945 10.2344 5.30859 10.2344Z" fill="#424242" />
                    </svg>
                    <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.16797 9.66309C5.16797 9.97949 5.41406 10.2168 5.74805 10.2168H8.42871V12.8975C8.42871 13.2314 8.66602 13.4688 8.98242 13.4688C9.3252 13.4688 9.5625 13.2402 9.5625 12.8975V10.2168H12.2432C12.5771 10.2168 12.8145 9.97949 12.8145 9.66309C12.8145 9.32031 12.5859 9.08301 12.2432 9.08301H9.5625V6.40234C9.5625 6.05957 9.3252 5.82227 8.98242 5.82227C8.66602 5.82227 8.42871 6.06836 8.42871 6.40234V9.08301H5.74805C5.40527 9.08301 5.16797 9.32031 5.16797 9.66309Z" fill="#424242" />
                    </svg>

                </span>
            </div>
            <ul class="sidebar__body grid gap-y-3  mt-4">
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Đen">
                        Đen
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Nâu">
                        Nâu
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Xám">
                        Xám
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidebar__box border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    Bộ sưu tập
                </h3>
                <span class="sidebar__icon ml-auto w-[18px] h-[18px]">
                    <svg class="" width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.30859 10.2344H12.6914C13.0518 10.2344 13.3154 10.0234 13.3154 9.67188C13.3154 9.31152 13.0693 9.10059 12.6914 9.10059H5.30859C4.92188 9.10059 4.67578 9.31152 4.67578 9.67188C4.67578 10.0234 4.93945 10.2344 5.30859 10.2344Z" fill="#424242" />
                    </svg>
                    <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.16797 9.66309C5.16797 9.97949 5.41406 10.2168 5.74805 10.2168H8.42871V12.8975C8.42871 13.2314 8.66602 13.4688 8.98242 13.4688C9.3252 13.4688 9.5625 13.2402 9.5625 12.8975V10.2168H12.2432C12.5771 10.2168 12.8145 9.97949 12.8145 9.66309C12.8145 9.32031 12.5859 9.08301 12.2432 9.08301H9.5625V6.40234C9.5625 6.05957 9.3252 5.82227 8.98242 5.82227C8.66602 5.82227 8.42871 6.06836 8.42871 6.40234V9.08301H5.74805C5.40527 9.08301 5.16797 9.32031 5.16797 9.66309Z" fill="#424242" />
                    </svg>

                </span>
            </div>
            <ul class="sidebar__body grid gap-y-3  mt-4">
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Bộ sưu tập 01">
                        Bộ sưu tập 01
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Bộ sưu tập 02">
                        Bộ sưu tập 02
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Bộ sưu tập 03">
                        Bộ sưu tập 03
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidebar__box border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    Nhà thiết kế
                </h3>
                <span class="sidebar__icon ml-auto w-[18px] h-[18px]">
                    <svg class="" width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.30859 10.2344H12.6914C13.0518 10.2344 13.3154 10.0234 13.3154 9.67188C13.3154 9.31152 13.0693 9.10059 12.6914 9.10059H5.30859C4.92188 9.10059 4.67578 9.31152 4.67578 9.67188C4.67578 10.0234 4.93945 10.2344 5.30859 10.2344Z" fill="#424242" />
                    </svg>
                    <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.16797 9.66309C5.16797 9.97949 5.41406 10.2168 5.74805 10.2168H8.42871V12.8975C8.42871 13.2314 8.66602 13.4688 8.98242 13.4688C9.3252 13.4688 9.5625 13.2402 9.5625 12.8975V10.2168H12.2432C12.5771 10.2168 12.8145 9.97949 12.8145 9.66309C12.8145 9.32031 12.5859 9.08301 12.2432 9.08301H9.5625V6.40234C9.5625 6.05957 9.3252 5.82227 8.98242 5.82227C8.66602 5.82227 8.42871 6.06836 8.42871 6.40234V9.08301H5.74805C5.40527 9.08301 5.16797 9.32031 5.16797 9.66309Z" fill="#424242" />
                    </svg>

                </span>
            </div>
            <ul class="sidebar__body grid gap-y-3  mt-4">
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Nhà thiết kế 01">
                        Nhà thiết kế 01
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Nhà thiết kế 02">
                        Nhà thiết kế 02
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Nhà thiết kế 03">
                        Nhà thiết kế 03
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidebar__box border-t border-[#EEEEEE] pt-4">
            <div class="sidebar__header flex items-center cursor-pointer">
                <h3 class="sidebar__title text-[#212529] text-base  font-semibold">
                    Chất liệu
                </h3>
                <span class="sidebar__icon ml-auto w-[18px] h-[18px]">
                    <svg class="" width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.30859 10.2344H12.6914C13.0518 10.2344 13.3154 10.0234 13.3154 9.67188C13.3154 9.31152 13.0693 9.10059 12.6914 9.10059H5.30859C4.92188 9.10059 4.67578 9.31152 4.67578 9.67188C4.67578 10.0234 4.93945 10.2344 5.30859 10.2344Z" fill="#424242" />
                    </svg>
                    <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18.4697C13.8252 18.4697 17.8154 14.4795 17.8154 9.6543C17.8154 4.82031 13.8252 0.838867 8.99121 0.838867C4.16602 0.838867 0.18457 4.82031 0.18457 9.6543C0.18457 14.4795 4.1748 18.4697 9 18.4697ZM9 17.3271C4.74609 17.3271 1.32715 13.8994 1.32715 9.6543C1.32715 5.40039 4.74609 1.97266 8.99121 1.97266C13.2451 1.97266 16.6729 5.40039 16.6816 9.6543C16.6816 13.8994 13.2539 17.3271 9 17.3271ZM5.16797 9.66309C5.16797 9.97949 5.41406 10.2168 5.74805 10.2168H8.42871V12.8975C8.42871 13.2314 8.66602 13.4688 8.98242 13.4688C9.3252 13.4688 9.5625 13.2402 9.5625 12.8975V10.2168H12.2432C12.5771 10.2168 12.8145 9.97949 12.8145 9.66309C12.8145 9.32031 12.5859 9.08301 12.2432 9.08301H9.5625V6.40234C9.5625 6.05957 9.3252 5.82227 8.98242 5.82227C8.66602 5.82227 8.42871 6.06836 8.42871 6.40234V9.08301H5.74805C5.40527 9.08301 5.16797 9.32031 5.16797 9.66309Z" fill="#424242" />
                    </svg>

                </span>
            </div>
            <ul class="sidebar__body grid gap-y-3  mt-4">
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Vải">
                        Vải 01
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="#" class="sidebar__link text-[#424242] text-sm hover:text-[#343A40] hover:font-semibold" title="Da">
                        Đa
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="page__product--content w-full">
        <h1 class="text-[#212529] text-[32px]">
            Sofa đơn
        </h1>
        <p class="text-[#424242] text-base mt-6">
            Hãy tạo cho mình một không gian thư giãn bằng cách kết hợp một góc không gian nhỏ trong ngôi nhà của bạn cùng một chiếc ghế sofa đơn, vừa thiết thực lại vừa hoàn toàn thoải mái.
        </p>

        <div class="banner__product my-6">
            <img src="images/banner__product.png" alt="banner__product.png w-full">
        </div>

        <div class="page__product--group  grid gap-4 grid-cols-3">
        @foreach ($data as $item)
            <div class="product__item border border-[#D1D1D6] relative transition duration-150 ease-out hover:ease-in  flex flex-col px-3 py-3 hover:shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                <span class="absolute top-3 left-3 text-white text-sm font-semibold z-10 bg-[#232323] px-3 py-[6px]">
                    -50%
                </span>
                <span class="like w-6 h-6  flex items-center  justify-center absolute right-3 top-3 z-10">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
                <?php $slug = str_replace('/', '', $item->previewLink); ?>
                <a href="{{ route('home.single-products', ['slug' => $slug]) }}" class="flex items-center justify-center h-[280px] thumbnail" title="Sofa Modena 2 seater">
                    <img src="{{ $item->image }}" alt="product__page.png" class="w-full h-full object-contain" />
                </a>


                <div class="flex items-center mt-[22px]">
                    <div class="item">
                        <svg width="68" height="32" viewbox="0 0 68 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15.9707" y="0.414214" width="22" height="22" rx="3" transform="rotate(45 15.9707 0.414214)" fill="#BFBFBF" stroke="white" stroke-width="2" />
                            <rect x="33.9062" y="0.414214" width="22" height="22" rx="3" transform="rotate(45 33.9062 0.414214)" fill="#868E96" stroke="white" stroke-width="2" />
                            <rect x="51.8438" y="0.414214" width="22" height="22" rx="3" transform="rotate(45 51.8438 0.414214)" fill="#424242" stroke="white" stroke-width="2" />
                        </svg>

                    </div>

                </div>

                <a href="{{ route('home.single-products', ['slug' => $item->previewLink]) }}" class="content pt-4 mb-4" title="Sofa Modena 2 seater">
                    <h3 class="product__title text-[#212529] text-sm mb-1">{{ $item->name }}</h3>
                    <p class="text-[#868E96] text-xs">{{ $item->otherName }}</p>
                </a>
                <div class="mt-auto flex items-center gap-1">
                    <p class=" text-base font-semibold">{{ number_format($item->price, 0, '.', '.') }}</p>
                </div>
            </div>
        @endforeach
        </div>
        <ul class="pagination flex my-10">
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

            <li class="pagination-item active">
                <a href="#" class="pagination-item-link text__black--900">1</a>
            </li>
            <li class="pagination-item">
                <a href="#" class="pagination-item-link text__black--900">2</a>
            </li>
            <li class="pagination-item">
                <a href="#" class="pagination-item-link text__black--900">3</a>
            </li>
            <li class="pagination-item">
                ...
            </li>
            <li class="pagination-item pagination__next">
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
            <li class="pagination-item  pagination__next--all">
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
        </ul>

        <div class="rooms-same-type mt-10 border-t border-[#EEEEEE] mb-20 pt-10">
            <h2 class="text-2xl  text-[#212529] font-semibold">
                Ứng dụng trong bài trí phòng
            </h2>
            <div class="same-type mt-6">
                <div class="same-slide">
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-1.png" alt="sameType-1.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách 12
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-1.png" alt="sameType-1.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-2.png" alt="sameType-2.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách 12
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-2.png" alt="sameType-2.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-3.png" alt="sameType-3.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách 12
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-3.png" alt="sameType-3.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-4.png" alt="sameType-4.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách 12
                            </h3>
                        </a>
                    </div>
                    <div class="item px-2">
                        <a href="#" class="same-box block" title="Phòng khách 12">
                            <div class="h-[392px] overflow-hidden">
                                <img src="images/sameType-4.png" alt="sameType-4.png" class="w-full h-full object-cover hover:opacity-70 transition-all">
                            </div>
                            <h3 class="text-[#424242] text-sm mt-2">
                                Phòng khách
                            </h3>
                        </a>
                    </div>
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

