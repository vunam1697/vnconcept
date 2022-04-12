<header class="header bg-[#232323] relative" id="header">
    <div class="container__wrapper">
        <div class="header__container flex items-center flex-wrap">
            <a href="{{ url('/') }}" title="vnconcept" class="logo flex items-center justify-center w-[127.65px]">
                <img src="{{ url($site_info->logo) }}" alt="logo" class="w-full object-contain flex">
            </a>
            <div class="menu__container">
                <ul class="menu__addon flex justify-center items-center ml-[59.35px]">
                    <li class=" ">
                        <a href="{{ route('home.products') }}" title="PRODUCTS" class="menu__link flex text-white text-transparent-unp uppercase text-base px-4 pt-[26px] pb-[22px]">
                            PRODUCTS
                        </a>
                        <div class="menu__omega absolute opacity-0 translate-y-5 left-0 right-0 top-full bg-white z-50 w-full shadow-[0px_8px_15px_rgba(0,0,0,0.15)] pt-6 pb-12">
                            <div class="container__wrapper">
                                <div class="bs-tab">
                                    <div class="tab-container__wrapper flex items-start">
                                        <div class="flex-shrink-0 max-w-[286px] w-full border-r border-[#EEEEEE]">
                                            <ul class="control-list grid gap-y-2">
                                                @foreach ($category as $key => $item)
                                                <li class="control-list__item cursor-pointer flex items-center  px-4 py-[10px]  text-[#232323] text-base {{ $key == 0 ? 'active' : '' }}" tab-show="#tab{{ $key + 1 }}">{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                        @foreach ($category as $key => $item)
                                            <div class="tab-item hidden {{ $key == 0 ? 'active' : '' }}" id="tab{{ $key + 1 }}">
                                                <div class="table-item__grid grid grid-cols-3 gap-y-8 gap-x-[114px] ml-[130px]">
                                                    @if (count($item->get_child_cate()))
                                                    <div class="min-w-[183px]">
                                                        <div class="gap gap-y-3">
                                                            @foreach ($item->get_child_cate() as $value)
                                                            <a href="{{ route('home.category-product', ['slug' => $value->slug]) }}" class="flex hover:opacity-80 w-full items-center text-[#424242] text-base py-1" title="{{ $value->name }}">
                                                                {{ $value->name }}
                                                            </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ul class="menu__mobile">
                        @foreach ($category as $key => $item)
                            <li>
                                <a href="{{ route('home.category-product', ['slug' => $item->slug]) }}" title="{{ $item->name }}" class="cursor-pointer flex items-center  px-7 py-[10px]  text-[#232323] text-base">
                                    {{ $item->name }}
                                </a>
                                @if (count($item->get_child_cate()))
                                <ul class="hidden">
                                    <li>
                                        <div class="gap gap-y-3">
                                            @foreach ($item->get_child_cate() as $value)
                                            <a href="{{ route('home.category-product', ['slug' => $value->slug]) }}" class="flex hover:opacity-80 w-full items-center text-[#424242] text-base py-1" title="{{ $value->name }}">
                                                {{ $value->name }}
                                            </a>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="{{ route('home.rooms') }}" title="ROOMS" class="menu__link flex text-white text-transparent-unp uppercase text-base px-4 pt-[26px] pb-[22px]">
                            ROOMS
                        </a>
                        <div class="menu__omega absolute opacity-0 translate-y-5 left-0 right-0 top-full bg-white z-50 w-full shadow-[0px_8px_15px_rgba(0,0,0,0.15)] pt-6 pb-12">
                            <div class="container__wrapper">
                                <div class="bs-tab">
                                    <div class="tab-container__wrapper flex items-start">
                                        <div class="flex-shrink-0 max-w-[286px] w-full border-r border-[#EEEEEE]">
                                            <ul class="control-list grid gap-y-2">
                                                @foreach ($category_rooms as $key => $item)
                                                <li class="control-list__item cursor-pointer flex items-center  px-4 py-[10px]  text-[#232323] text-base {{ $key == 0 ? 'active' : '' }}" tab-show="#tab{{ $key +1 }}">{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                        @foreach ($category_rooms as $key => $item)
                                            <div class="tab-item hidden active" id="tab1">
                                                <div class="table-item__grid grid grid-cols-3 gap-y-8 gap-x-[114px] ml-[130px]">
                                                @if (count($item->get_child()))
                                                    <div class="min-w-[183px]">
                                                        <div class="gap gap-y-3">
                                                        @foreach ($item->get_child() as $value)
                                                            <a href="" class="flex hover:opacity-80 w-full items-center text-[#424242] text-base py-1" title="{{ $value->name }}">
                                                                {{ $value->name }}
                                                            </a>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ul class="menu__mobile">
                            @foreach ($category_rooms as $key => $item)
                            <li>
                                <a href="#" title="{{ $item->name }}" class="cursor-pointer flex items-center  px-7 py-[10px]  text-[#232323] text-base">
                                    {{ $item->name }}
                                </a>
                                @if (count($item->get_child()))
                                <ul class="hidden">
                                    <li>
                                        <div class="gap gap-y-3">
                                        @foreach ($item->get_child() as $value)
                                            <a href="" class="flex hover:opacity-80 w-full items-center text-[#424242] text-base py-1" title="{{ $value->name }}">
                                                {{ $value->name }}
                                            </a>
                                        @endforeach
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="{{ route('home.collection') }}" title="COLLECTIONS" class="menu__link flex text-white text-transparent-unp uppercase text-base px-4 pt-[26px] pb-[22px]">
                            COLLECTIONS
                        </a>
                        <div class="menu__omega absolute opacity-0 translate-y-5 left-0 right-0 top-full bg-white z-50 w-full shadow-[0px_8px_15px_rgba(0,0,0,0.15)] pt-6 pb-12">
                            <div class="container__wrapper">
                                <div class="bs-tab">
                                    <div class="tab-container__wrapper flex items-start">
                                        <div class="flex-shrink-0 max-w-[286px] w-full border-r border-[#EEEEEE]">
                                            <ul class="control-list grid gap-y-2">
                                                @foreach ($category_collection as $key => $item)
                                                <li class="control-list__item cursor-pointer flex items-center  px-4 py-[10px]  text-[#232323] text-base {{ $key == 0 ? 'active' : '' }}" tab-show="#tab{{ $key +1 }}">{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                        @foreach ($category_collection as $key => $item)
                                            <div class="tab-item hidden active" id="tab1">
                                                <div class="table-item__grid grid grid-cols-3 gap-y-8 gap-x-[114px] ml-[130px]">
                                                @if (count($item->get_child()))
                                                    <div class="min-w-[183px]">
                                                        <div class="gap gap-y-3">
                                                        @foreach ($item->get_child() as $value)
                                                            <a href="" class="flex hover:opacity-80 w-full items-center text-[#424242] text-base py-1" title="{{ $value->name }}">
                                                                {{ $value->name }}
                                                            </a>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ul class="menu__mobile">
                            @foreach ($category_collection as $key => $item)
                            <li>
                                <a href="#" title="{{ $item->name }}" class="cursor-pointer flex items-center  px-7 py-[10px]  text-[#232323] text-base">
                                    {{ $item->name }}
                                </a>
                                @if (count($item->get_child()))
                                <ul class="hidden">
                                    <li>
                                        <div class="gap gap-y-3">
                                        @foreach ($item->get_child() as $value)
                                            <a href="" class="flex hover:opacity-80 w-full items-center text-[#424242] text-base py-1" title="{{ $value->name }}">
                                                {{ $value->name }}
                                            </a>
                                        @endforeach
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <form action="{{ route('home.search') }}" method="GET" class="flex items-center border-b border-white pr-3 w-full max-w-[298px] ml-auto add__search">
                <input type="text" placeholder="Tìm kiếm" name="q" value="{{ request()->get('q') }}" class="add__search--input w-full border-0 h-7 bg-transparent text-white text-base placeholder:text-white  outline-none">
                <button class="w-6 h-6 flex-shrink-0">
                    <img src="{{ url('/uploads/images/icons/icon__search.svg') }}" alt="icon__search.svg" class="flex w-5 object-contain">
                </button>
            </form>

            <div class="header__actions flex items-center gap-6 ml-6">
                <a href="#" title="heart" class="w-6 h-6 flex justify-center items-center">
                    <img src="{{ url('/uploads/images/icons/icon__heart.svg') }}" alt="icon__heart.svg" class="flex w-5" title="favorite product">
                </a>
                <a href="{{ route('home.cart') }}" class="w-6 h-6 flex justify-center items-center" title="giỏ hàng">
                    <img src="{{ url('/uploads/images/icons/icon__cart.svg') }}" alt="icon__cart.svg" class="flex w-5">
                </a>
                <a href="javascript:void(0)" title="heart" class="w-6 h-6 flex justify-center items-center text-white uppercase" title="language">
                    VN
                </a>
                <a href="{{ route('home.login') }}" title="Đăng nhập" class="w-6 h-6 flex justify-center items-center text-white uppercase" title="language">
                    <img src="{{ url('/uploads/images/icons/icon__user.svg') }}" alt="icon__user.svg" class="flex w-5">
                </a>
            </div>
            <button class="toggle__menu w-6 h-6 bg-white flex justify-center items-center rounded ml-4 hidden">
                <svg width="17" height="15" viewbox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1973 4.98438C12.041 4.98438 12.7598 4.46094 13.0566 3.71875H15.6426C16.0254 3.71875 16.3535 3.38281 16.3535 2.97656C16.3535 2.57031 16.0332 2.23438 15.6426 2.23438H13.0645C12.7676 1.49219 12.041 0.96875 11.1973 0.96875C10.3535 0.96875 9.62695 1.49219 9.33008 2.23438L0.978515 2.23438C0.564453 2.23438 0.24414 2.57031 0.24414 2.97656C0.24414 3.38281 0.572265 3.71875 0.978515 3.71875H9.33008C9.62695 4.46094 10.3535 4.98438 11.1973 4.98438ZM11.1973 3.92969C10.666 3.92969 10.2363 3.50781 10.2363 2.97656C10.2363 2.42969 10.666 2.01563 11.1973 2.01563C11.7363 2.01563 12.1504 2.42969 12.1504 2.97656C12.1504 3.50781 11.7363 3.92969 11.1973 3.92969ZM0.947265 7.10156C0.564453 7.10156 0.24414 7.42969 0.24414 7.84375C0.24414 8.24219 0.572265 8.57812 0.947265 8.57812H3.62695C3.91602 9.32031 4.64258 9.85156 5.49414 9.85156C6.33008 9.85156 7.05664 9.32031 7.35352 8.57812L15.6191 8.57813C16.0254 8.57813 16.3535 8.25 16.3535 7.84375C16.3535 7.42969 16.0332 7.10156 15.6191 7.10156L7.35352 7.10156C7.05664 6.35938 6.33008 5.83594 5.49414 5.83594C4.65039 5.83594 3.92383 6.35938 3.62695 7.10156H0.947265ZM5.49414 8.79688C4.95508 8.79688 4.5332 8.375 4.5332 7.84375C4.5332 7.29688 4.95508 6.88281 5.49414 6.88281C6.0332 6.88281 6.44727 7.29688 6.44727 7.84375C6.44727 8.375 6.0332 8.79688 5.49414 8.79688ZM11.1973 14.7109C12.041 14.7109 12.7676 14.1875 13.0645 13.4453H15.6426C16.0254 13.4453 16.3535 13.1094 16.3535 12.7031C16.3535 12.2891 16.0332 11.9609 15.6426 11.9609H13.0566C12.7676 11.2188 12.041 10.6953 11.1973 10.6953C10.3535 10.6953 9.62695 11.2188 9.33008 11.9609H0.978515C0.564453 11.9609 0.24414 12.2969 0.24414 12.7031C0.24414 13.1094 0.572265 13.4453 0.978515 13.4453H9.33008C9.62695 14.1875 10.3535 14.7109 11.1973 14.7109ZM11.1973 13.6641C10.666 13.6641 10.2363 13.2344 10.2363 12.7031C10.2363 12.1641 10.666 11.7422 11.1973 11.7422C11.7363 11.7422 12.1504 12.1641 12.1504 12.7031C12.1504 13.2344 11.7363 13.6641 11.1973 13.6641Z" fill="#232323" />
                </svg>
            </button>
        </div>
    </div>
</header>
