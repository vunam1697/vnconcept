@extends('frontend.master')
@section('main')
    <div class="page__detail pt-7 pb-8">
        <ul class="text-[#868E96] flex items-center text-sm gap-[13px] breadcrumb">
            <li>
                <a href="{{ route('home.products') }}" title="Sản phẩm">Sản phẩm</a>
            </li>
            @if (!empty($data->category->name))
            <li>
                <a href="{{ route('home.category-product', ['slug' => $data->category->slug]) }}" title="{{ @$data->category->name }}">{{ @$data->category->name }}</a>
            </li>
            @endif
            <li>
                <a href="javascript:void(0)" title="{{ $data->name }}" class="text-[#232323]">{{ $data->name }}</a>
            </li>
        </ul>

        <div class="detail__slide max-w-[1010px] w-full mt-12 mx-auto">
            <div class="slide__product">
                <div class="slide__item">
                    <img src="{{ $data->image }}" class="max-w-full w-full object-contain block mx-auto" alt="{{ $data->name }}">
                </div>
            </div>
        </div>

    <div class="detail__group mt-8 flex items-start flex-wrap  pt-12">
        <div class="detail__content max-w-[calc(100%_-_389px)] w-full pr-[119px]">

            <h1 class="text-[#212529] font-bold text-[32px] mb-10">
                {{ $data->name }}
            </h1>
            <div class="bs-tab">
                <div class="tab-container">
                    <div class="tab-control">
                        <ul class="control-list flex gap-10  text-[#232323]">
                            <li class="control-list__item pb-[19px] !font-normal cursor-pointer active" tab-show="#Cooker1">Mô tả</li>
                            <li class="control-list__item pb-[19px] !font-normal cursor-pointer" tab-show="#Cooker2">Thông số kỹ thuật</li>


                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-item hidden active" id="Cooker1">
                            <div class="mt-10 text-[#868E96] text-base">
                                {!! $data->content !!}

                            </div>
                        </div>
                        <div class="tab-item hidden" id="Cooker2">

                            <div class="grid grid-cols-1 gap-10">
                                <div class="group pt-10">
                                    <!-- <div class="group__header flex items-center cursor-pointer">
                                        <h3 class="text-[#212529] font-bold text-lg">
                                            Giới thiệu
                                        </h3>
                                        <span class="w-7 h-7 ml-auto justify-center items-center flex transition-all">
                                            <svg width="14" height="9" viewbox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0.476561C6.80469 0.476561 6.60938 0.554686 6.47656 0.703124L0.429688 6.89844C0.296875 7.03125 0.21875 7.20312 0.21875 7.39844C0.21875 7.80469 0.523438 8.11719 0.929688 8.11719C1.125 8.11719 1.30469 8.03906 1.4375 7.91406L7 2.22656L12.5703 7.91406C12.6953 8.03906 12.875 8.11719 13.0781 8.11719C13.4844 8.11719 13.7891 7.80469 13.7891 7.39844C13.7891 7.20312 13.7109 7.03125 13.5781 6.89062L7.53125 0.703124C7.38281 0.554686 7.20313 0.476561 7 0.476561Z" fill="#343A40" />
                                            </svg>

                                        </span>
                                    </div> -->
                                    <div class="group__body pt-6 text-[#868E96] text-sm text-justify">
                                        {!! $data->specification !!}
                                    </div>
                                </div>
                                <div class="group pt-10">
                                    <div class="group__header flex items-center cursor-pointer">
                                        <h3 class="text-[#212529] font-bold text-lg">
                                            Chi tiết sản phẩm
                                        </h3>
                                        <span class="w-7 h-7 ml-auto justify-center items-center flex transition-all">
                                            <svg width="14" height="9" viewbox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0.476561C6.80469 0.476561 6.60938 0.554686 6.47656 0.703124L0.429688 6.89844C0.296875 7.03125 0.21875 7.20312 0.21875 7.39844C0.21875 7.80469 0.523438 8.11719 0.929688 8.11719C1.125 8.11719 1.30469 8.03906 1.4375 7.91406L7 2.22656L12.5703 7.91406C12.6953 8.03906 12.875 8.11719 13.0781 8.11719C13.4844 8.11719 13.7891 7.80469 13.7891 7.39844C13.7891 7.20312 13.7109 7.03125 13.5781 6.89062L7.53125 0.703124C7.38281 0.554686 7.20313 0.476561 7 0.476561Z" fill="#343A40" />
                                            </svg>

                                        </span>
                                    </div>
                                    <?php $detailProduct = json_decode(@$data->detailProduct) ?>
                                    @if (!empty($detailProduct))
                                    <div class="group__body pt-6 text-[#212529] text-base">
                                        <div class="group__body--item grid gap-y-5 gap-x-[117px] grid-cols-2 items-start mb-6">
                                            @foreach ($detailProduct as $item)
                                            <div class="flex items-center gap-x-4">
                                                <span class="w-[22px] h-[22px] flex items-center flex-shrink-0">
                                                    <svg width="19" height="15" viewbox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.95312 14.375C10.4766 14.375 10.7578 14.1016 10.7578 13.5781V1.14844C10.7578 0.625 10.4766 0.351562 9.95312 0.351562C9.42969 0.351562 9.14844 0.625 9.14844 1.14844V13.5781C9.14844 14.1016 9.42969 14.375 9.95312 14.375ZM1.79688 11.2656C2.32031 11.2656 2.59375 10.9922 2.59375 10.4688V4.25781C2.59375 3.73438 2.32031 3.46094 1.79688 3.46094C1.26562 3.46094 0.992188 3.73438 0.992188 4.25781V10.4688C0.992188 10.9922 1.26562 11.2656 1.79688 11.2656ZM18.1094 11.2656C18.6406 11.2656 18.9141 10.9922 18.9141 10.4688V4.25781C18.9141 3.73438 18.6406 3.46094 18.1094 3.46094C17.5859 3.46094 17.3125 3.73438 17.3125 4.25781V10.4688C17.3125 10.9922 17.5859 11.2656 18.1094 11.2656ZM5.875 9.29688C6.39844 9.29688 6.67188 9.02344 6.67188 8.49219V6.23438C6.67188 5.70312 6.39844 5.42969 5.875 5.42969C5.35156 5.42969 5.07812 5.70312 5.07812 6.23438V8.49219C5.07812 9.02344 5.35156 9.29688 5.875 9.29688ZM14.0312 9.29688C14.5547 9.29688 14.8281 9.02344 14.8281 8.49219V6.23438C14.8281 5.70312 14.5547 5.42969 14.0312 5.42969C13.5078 5.42969 13.2344 5.70312 13.2344 6.23438V8.49219C13.2344 9.02344 13.5078 9.29688 14.0312 9.29688Z" fill="#232323" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    {{ $item->name }}: {{ $item->content }}
                                                </span>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- <a href="#" title="Xem tất cả" class="text-[#424242] text-sm underline">
                                            Xem tất cả
                                        </a> -->
                                    </div>
                                    @endif
                                </div>
                                @if (!empty($inventory))
                                <div class="group pt-10">
                                    <div class="group__header flex items-center cursor-pointer">
                                        <h3 class="text-[#212529] font-bold text-lg">
                                            Chi tiết kho hàng
                                        </h3>
                                        <span class="w-7 h-7 ml-auto justify-center items-center flex transition-all">
                                            <svg width="14" height="9" viewbox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0.476561C6.80469 0.476561 6.60938 0.554686 6.47656 0.703124L0.429688 6.89844C0.296875 7.03125 0.21875 7.20312 0.21875 7.39844C0.21875 7.80469 0.523438 8.11719 0.929688 8.11719C1.125 8.11719 1.30469 8.03906 1.4375 7.91406L7 2.22656L12.5703 7.91406C12.6953 8.03906 12.875 8.11719 13.0781 8.11719C13.4844 8.11719 13.7891 7.80469 13.7891 7.39844C13.7891 7.20312 13.7109 7.03125 13.5781 6.89062L7.53125 0.703124C7.38281 0.554686 7.20313 0.476561 7 0.476561Z" fill="#343A40" />
                                            </svg>

                                        </span>
                                    </div>
                                    <div class="group__body pt-6 text-[#212529] text-base">
                                        <div class="overflow-auto border-[0.5px] border-[#AEAEB2] rounded-lg">
                                            <table class="table min-w-[693px] w-full text-center overflow-hidden">
                                                <thead class=" font-bold">
                                                    <tr>
                                                        <th class="p-3">
                                                            Kho TLI
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="p-3">
                                                            {{ $inventory->remain }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="group pt-10">
                                    <div class="group__header flex items-center cursor-pointer">
                                        <h3 class="text-[#212529] font-bold text-lg">
                                            Thông tin khác
                                        </h3>
                                        <span class="w-7 h-7 ml-auto justify-center items-center flex transition-all">
                                            <svg width="14" height="9" viewbox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0.476561C6.80469 0.476561 6.60938 0.554686 6.47656 0.703124L0.429688 6.89844C0.296875 7.03125 0.21875 7.20312 0.21875 7.39844C0.21875 7.80469 0.523438 8.11719 0.929688 8.11719C1.125 8.11719 1.30469 8.03906 1.4375 7.91406L7 2.22656L12.5703 7.91406C12.6953 8.03906 12.875 8.11719 13.0781 8.11719C13.4844 8.11719 13.7891 7.80469 13.7891 7.39844C13.7891 7.20312 13.7109 7.03125 13.5781 6.89062L7.53125 0.703124C7.38281 0.554686 7.20313 0.476561 7 0.476561Z" fill="#343A40" />
                                            </svg>

                                        </span>
                                    </div>
                                    <div class="group__body pt-6 text-[#212529] text-base">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="other__information px-6 py-5 border border-[#AEAEB2] rounded-lg overflow-hidden">
                                                <span class="other__icon w-6 h-6 rounded-ful flex items-center">
                                                    <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11 21.0371C16.5176 21.0371 21.0879 16.4766 21.0879 10.9492C21.0879 5.43164 16.5176 0.861328 10.9902 0.861328C5.47266 0.861328 0.912109 5.43164 0.912109 10.9492C0.912109 16.4766 5.48242 21.0371 11 21.0371ZM11 19.0547C6.50781 19.0547 2.9043 15.4414 2.9043 10.9492C2.9043 6.45703 6.49805 2.85352 10.9902 2.85352C15.4824 2.85352 19.0957 6.45703 19.1055 10.9492C19.1055 15.4414 15.4922 19.0547 11 19.0547ZM10.9414 7.62891C11.6836 7.62891 12.2695 7.0332 12.2695 6.30078C12.2695 5.54883 11.6836 4.95312 10.9414 4.95312C10.209 4.95312 9.61328 5.54883 9.61328 6.30078C9.61328 7.0332 10.209 7.62891 10.9414 7.62891ZM9.27148 16.2617H13.2363C13.6758 16.2617 14.0176 15.9492 14.0176 15.5098C14.0176 15.0898 13.6758 14.7578 13.2363 14.7578H12.1426V10.1191C12.1426 9.5332 11.8496 9.15234 11.3027 9.15234H9.44727C9.01758 9.15234 8.66602 9.48438 8.66602 9.9043C8.66602 10.3438 9.01758 10.6562 9.44727 10.6562H10.4434V14.7578H9.27148C8.8418 14.7578 8.5 15.0898 8.5 15.5098C8.5 15.9492 8.8418 16.2617 9.27148 16.2617Z" fill="#424242" />
                                                    </svg>
                                                </span>
                                                <h3 class="text-[#424242] text-base font-semibold uppercase mt-5">
                                                    MÃ SỐ SẢN PHẨM
                                                </h3>
                                                <p class="text-sm text-[#868E96] mt-2">
                                                    {{ $data->code }}
                                                </p>

                                            </div>
                                            @if (!empty($data->designer))
                                            <div class="other__information px-6 py-5 border border-[#AEAEB2] rounded-lg overflow-hidden">
                                                <span class="other__icon w-6 h-6 rounded-ful flex items-center">
                                                    <svg width="21" height="22" viewbox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.5 21.0371C16.0176 21.0371 20.5879 16.4766 20.5879 10.9492C20.5879 5.43164 16.0176 0.861328 10.4902 0.861328C4.97266 0.861328 0.412109 5.43164 0.412109 10.9492C0.412109 16.4766 4.98242 21.0371 10.5 21.0371ZM10.5 14.3184C7.7168 14.3184 5.56836 15.3047 4.54297 16.4473C3.21484 15.0117 2.4043 13.0781 2.4043 10.9492C2.4043 6.45703 5.99805 2.85352 10.4902 2.85352C14.9824 2.85352 18.5957 6.45703 18.6055 10.9492C18.6055 13.0781 17.7949 15.0117 16.4668 16.457C15.4316 15.3047 13.2832 14.3184 10.5 14.3184ZM10.5 12.7168C12.3945 12.7266 13.8594 11.1152 13.8594 9.01562C13.8594 7.04297 12.3848 5.40234 10.5 5.40234C8.625 5.40234 7.13086 7.04297 7.14062 9.01562C7.15039 11.1152 8.61523 12.6973 10.5 12.7168Z" fill="#424242" />
                                                    </svg>

                                                </span>
                                                <h3 class="text-[#424242] text-base font-semibold uppercase mt-5">
                                                    NHÀ THIẾT KẾ
                                                </h3>
                                                <p class="text-sm text-[#868E96] mt-2">
                                                {{ $data->designer }}
                                                </p>

                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <form action="{{ route('home.post-add-cart') }}" method="POST">
        @csrf
        <input type="hidden" name="id_product" value="{{ $data->id }}">
        <div class="sticky bg-white top-5 detail__total grid gap-y-8 max-w-[389px] w-full flex-shrink-0  py-8 px-4 border-[0.5px] border-[#BFBFBF] rounded-lg overflow-hidden">
            <div class="detail__total-header flex items-center ">
                <div class="total__left">
                    <p class="text-[#868E96] text-sm mb-1">
                        Giá từ
                    </p>
                    <span class="total__price text-[#212529] font-semibold">
                        {{ number_format($data->price, 0, '.', '.') }}đ
                    </span>
                </div>
                <span class="like w-6 h-6  flex items-center  justify-center ml-auto">
                    <svg width="18" height="16" viewbox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.757324 5.65771C0.757324 9.19385 3.7207 12.6719 8.40234 15.6602C8.57666 15.7681 8.82568 15.8843 9 15.8843C9.17432 15.8843 9.42334 15.7681 9.60596 15.6602C14.2793 12.6719 17.2427 9.19385 17.2427 5.65771C17.2427 2.71924 15.2256 0.644043 12.5361 0.644043C11.0005 0.644043 9.75537 1.37451 9 2.49512C8.26123 1.38281 6.99951 0.644043 5.46387 0.644043C2.77441 0.644043 0.757324 2.71924 0.757324 5.65771ZM2.09375 5.65771C2.09375 3.44971 3.52148 1.98047 5.44727 1.98047C7.00781 1.98047 7.9043 2.95166 8.43555 3.78174C8.65967 4.11377 8.80078 4.20508 9 4.20508C9.19922 4.20508 9.32373 4.10547 9.56445 3.78174C10.1372 2.96826 11.0005 1.98047 12.5527 1.98047C14.4785 1.98047 15.9062 3.44971 15.9062 5.65771C15.9062 8.74561 12.644 12.0742 9.17432 14.3818C9.09131 14.4399 9.0332 14.4814 9 14.4814C8.9668 14.4814 8.90869 14.4399 8.83398 14.3818C5.35596 12.0742 2.09375 8.74561 2.09375 5.65771Z" fill="#212529" />
                    </svg>
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19.8843C12.1743 19.8843 12.4233 19.7681 12.606 19.6602C17.2793 16.6719 20.2427 13.1938 20.2427 9.65771C20.2427 6.71924 18.2256 4.64404 15.6191 4.64404C14.0005 4.64404 12.7554 5.54053 12 6.91016C11.2612 5.54883 9.99951 4.64404 8.38086 4.64404C5.77441 4.64404 3.75732 6.71924 3.75732 9.65771C3.75732 13.1938 6.7207 16.6719 11.4023 19.6602C11.5767 19.7681 11.8257 19.8843 12 19.8843Z" fill="#212529" />
                    </svg>
                </span>
            </div>
            <button type="submit" class="hover:opacity-80 transition-all flex items-center justify-center text-white h-[46px] w-full bg-[#232323] text-base">
                Thêm vào giỏ hàng
            </button>
            @if ($data->typeId == 1)
            <a href="#" class="hover:opacity-80 transition-all flex items-center justify-center text-white h-[46px] w-full bg-[#868E96] text-base">
                Tải hình ảnh 3D của sản phẩm
            </a>
            @endif
        </div>
        </form>
    </div>
    <div class="similar__products pt-12">
        @if (count($product_relation) > 0)
            <h2 class="similar__products--title text-[#212529] text-lg font-bold">
                Các sản phẩm tương tự
            </h2>

            <div class="-mx-2">
                <div class="slide__similar">
                @foreach ($product_relation as $item)
                    <div class="similar__item">

                        <div class="similar__box pt-6 pb-12 px-2">
                            @include('frontend.components.product')
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endif
            @if (session()->has('data_viewed'))
            <h2 class="similar__products--title text-[#212529] text-lg font-bold">
                Các sản phẩm bạn đã xem
            </h2>
            <?php $productViewed = App\Models\Products::whereIn('id', session('data_viewed'))->where('status', 1)->get(); ?>

            <div class="-mx-2">
                <div class="slide__similar">
                @foreach ($productViewed as $item)
                    <div class="similar__item">

                        <div class="similar__box pt-6 pb-12 px-2">
                            @include('frontend.components.product')
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        @endif
    </div>
</div>
@stop

@section('script')
	<script>
		$(document).ready(function() {
            function album() {
                $('.slide__product').slick({
                    dots: false,
                    arrow: true,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true
                })
            }
            album()

            function group() {
                $('.group__header').on("click", function() {
                    $(this).toggleClass('active');
                    $(this).next('.group__body').slideToggle();
                })
            }
            group()

            function silderSimilar() {
                $('.slide__similar').slick({
                    dots: false,
                    arrow: true,
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 3,
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
                        breakpoint: 400.98,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }]
                })
            }
            silderSimilar()
        })
	</script>
@endsection
