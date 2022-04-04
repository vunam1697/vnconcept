<footer id="footer" class="shadow-[0px_-0.5px_0px_rgba(0,0,0,0.25)] pt-8 pb-20">
    <div class="container__wrapper">
        <a href="{{ url('/') }}" class=" flex items-center max-w-[187px] w-full mb-8">
            <img src="{{ url($site_info->logo_footer) }}" alt="icon-logo__footer.png" class="w-full object-contain">
        </a>
        <div class="footer__body grid grid-cols-2 gap-4 mb-8">
            <div class="item grid gap-y-3">
                <a href="{{ @$site_info->map }}" target="_bank" class="flex items-center gap-3 ">
                    <span class="icon w-6 h-6 flex items-center flex-shrink-0">
                        <img src="{{ url('/uploads/images/icons/icon_home.svg') }}" alt="icon_home.svg" class="object-contain">
                    </span>
                    <span class="text-sm text-[#212529] font-semibold">
                    {{ @$site_info->address }}
                    </span>
                </a>
                <a href="tel:{{ @$site_info->phone }}" class="flex items-center gap-3">
                    <span class="icon w-6 h-6 flex items-center flex-shrink-0">
                        <img src="{{ url('/uploads/images/icons/icon_phone.svg') }}" alt="icon_home.svg" class="object-contain">
                    </span>
                    <span class="text-sm text-[#212529]">
                        {{ @$site_info->phone }}
                    </span>
                </a>
                <a href="mailto:{{ @$site_info->email }}" class="flex items-center gap-3">
                    <span class="icon w-6 h-6 flex items-center flex-shrink-0">
                        <img src="{{ url('/uploads/images/icons/icon_email.svg') }}" alt="icon_email.svg" class="object-contain">
                    </span>
                    <span class="text-sm text-[#212529]">
                        {{ @$site_info->email }}
                    </span>
                </a>
                <a href="javascript:void(0)" class="flex items-center gap-3">
                    <span class="icon w-6 h-6 flex items-center flex-shrink-0">
                        <img src="{{ url('/uploads/images/icons/icon_code.svg') }}" alt="icon_code.svg" class="object-contain">
                    </span>
                    <span class="text-sm text-[javascript:void(0)#212529]">
                        Mã số doanh nghiệp: {{ @$site_info->business_code }}
                    </span>
                </a>
                <a href="javascript:void(0)" class="flex items-center gap-3">
                    <span class="icon w-6 h-6 flex items-center flex-shrink-0">
                        <img src="{{ url('/uploads/images/icons/icon_clen.svg') }}" alt="icon_clen.svg" class="object-contain">
                    </span>
                    <span class="text-sm text-[#212529]">
                        Nơi cấp: {{ @$site_info->place_grant }}
                    </span>
                </a>
            </div>
            <div class="footer__body--prhk grid grid-cols-2 gap-4">
                <div class="w-full">
                    <h3 class="font-semibold text-sm mb-5">
                        Sản phẩm
                    </h3>
                    <div class="menu__footer grid grid-cols-2 gap-y-3 gap-x-4">
                        <a href="#" title="Sofas" class="text-[#424242] text-sm">
                            Sofas
                        </a>
                        <a href="#" title="Tables" class="text-[#424242] text-sm">
                            Tables
                        </a>
                        <a href="#" title="Amchairs" class="text-[#424242] text-sm">
                            Amchairs
                        </a>
                        <a href="#" title="Lamps" class="text-[#424242] text-sm">
                            Lamps
                        </a>
                        <a href="#" title="Chairs" class="text-[#424242] text-sm">
                            Chairs
                        </a>
                        <a href="#" title="Rugs" class="text-[#424242] text-sm">
                            Rugs
                        </a>
                        <a href="#" title="CollectionsBeds" class="text-[#424242] text-sm">
                            CollectionsBeds
                        </a>
                        <a href="#" title="Decor" class="text-[#424242] text-sm">
                            Decor
                        </a>
                    </div>
                </div>
                <div class="w-full">
                    <h3 class="font-semibold text-sm mb-5">
                        Hỗ trợ khách hàng
                    </h3>
                    <div class="grid gap-y-3">
                        <a href="#" class="flex items-center gap-3 text-[#212529] text-sm" title="	Bảo hành bảo trì">
                            Bảo hành bảo trì
                        </a>
                        <a href="#" class="flex items-center gap-3 text-[#212529] text-sm" title="Đối tác chiến lược">
                            Đối tác chiến lược
                        </a>
                        <a href="#" class="flex items-center gap-3 text-[#212529] text-sm" title="Mua hàng, đổi trả">
                            Mua hàng, đổi trả
                        </a>
                        <a href="#" class="flex items-center gap-3 text-[#212529] text-sm" title="Chính sách thanh toán">
                            Chính sách thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right flex items-center border-t border-[#BFBFBF] pt-3">
            <span class="text-xs text-[#8E8E93]">{!! @$site_info->copyright !!}</span>
            <div class="grid grid-flow-col gap-3 ml-auto">
            @if (!empty(@$site_info->social))
                @foreach ($site_info->social as $item)
                <a href="{{ $item->link }}" target="_bank" title="{{ $item->name }}" class="flex items-center justify-center w-6 h-6 rounded-[100%] overflow-hidden bg-[#232323]">
                    <img src="{{ url($item->icon) }}" alt="icon__youtube">
                </a>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</footer>




