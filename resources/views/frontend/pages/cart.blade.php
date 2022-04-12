@extends('frontend.master')
@section('main')
    <div class="page__card flex items-start flex-wrap my-10">
    @if (Cart::count())
        <div class="card__product max-w-[592px] w-full">
            <h1 class="text-[#212529] font-semibold text-2xl mb-9 total-number">
                Giỏ hàng ({{ Cart::count() }})
            </h1>
            
            <div class="card__product--table grid gap-y-10">
            @foreach (Cart::content() as $item)
                <div class="card__box relative ">
                    <a href="{{ route('home.remove.cart', ['rowId' => $item->rowId]) }}" class="w-6 h-6 absolute right-0 top-10">
                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.4541 17.2178C6.68262 17.4551 7.06934 17.4463 7.29785 17.2178L12 12.5156L16.7021 17.2178C16.9307 17.4463 17.3174 17.4551 17.5459 17.2178C17.7832 16.9893 17.7744 16.6025 17.5459 16.374L12.8438 11.6719L17.5459 6.96094C17.7744 6.73242 17.7832 6.35449 17.5459 6.12598C17.3174 5.88867 16.9307 5.89746 16.7021 6.12598L12 10.8281L7.29785 6.12598C7.06934 5.89746 6.68262 5.88867 6.4541 6.12598C6.2168 6.35449 6.22559 6.73242 6.4541 6.96094L11.1562 11.6719L6.4541 16.374C6.22559 16.6025 6.2168 16.9893 6.4541 17.2178Z" fill="#212529" />
                        </svg>
                    </a>
                    <div class="card__box--img h-[315px]">
                        <img class=" w-full object-cover" src="{{ $item->options->image }}" alt="">
                    </div>
                    <div class="card__box--content text-[#212529]">
                        <div class="card__box-header flex items-center mb-5">
                            <h3 class="  font-semibold text-2xl">
                                {{ $item->name }}
                            </h3>
                            <div class="ml-auto flex items-center justify-center">
                                <span class="flex cursor-pointer justify-center items-center w-10 h-10 icon-minus-pre">
                                    <svg width="40" height="44" viewbox="0 0 40 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5508 22.999H25.9697C26.6729 22.999 27.2881 22.3926 27.2881 21.6631C27.2881 20.9424 26.6729 20.3359 25.9697 20.3359H13.5508C12.8828 20.3359 12.2412 20.9424 12.2412 21.6631C12.2412 22.3926 12.8828 22.999 13.5508 22.999Z" fill="#424242" />
                                    </svg>
                                </span>
                                <input type="hidden" name="get_id_product" data-url="{{route('home.update.cart')}}" value="{{$item->rowId}}">
                                <input type="text" value="{{$item->qty}}" name="qty" class="w-[60px] text-center h-10 outline-none border-transparent text-[#212529] text-2xl font-semibold get_id_product" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" />
                                <span class="flex cursor-pointer justify-center items-center w-10 h-10 icon-minus-next">
                                    <svg width="40" height="42" viewbox="0 0 40 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2412 21.1543C12.2412 21.6992 12.6895 22.1387 13.2256 22.1387H18.6133V27.5264C18.6133 28.0625 19.0615 28.5107 19.5977 28.5107C20.1338 28.5107 20.582 28.0625 20.582 27.5264V22.1387H25.9697C26.5059 22.1387 26.9541 21.6992 26.9541 21.1543C26.9541 20.6182 26.5059 20.1699 25.9697 20.1699H20.582V14.7822C20.582 14.2461 20.1338 13.7979 19.5977 13.7979C19.0615 13.7979 18.6133 14.2461 18.6133 14.7822V20.1699H13.2256C12.6895 20.1699 12.2412 20.6182 12.2412 21.1543Z" fill="#424242" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="card__box--text  gap-0 gap-y-2 text-sm">
                            <p>
                                Da thật, màu vàng bò
                            </p>
                            <p>
                                Chiều cao: 70 cm
                            </p>
                            <p>
                                Chiều rộng: 258 cm
                            </p>
                        </div>
                        <div class="flex justify-center items-center text-sm mt-4">
                            <a href="{{ route('home.single-products', ['slug' => $item->options->slug]) }}" class="text-[#212529] underline">
                                Chi tiết sản phẩm
                            </a>
                            <span class="ml-auto font-semibold cartitem-price">
                                {{ number_format($item->price, 0, '.', '.') }}đ
                            </span>
                        </div>
                        
                        <p class="error mb-3 gap-1 flex px-2 py-1 items-center text-[#212529] overflow-hidden rounded error_cart">
                            
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
            
        </div>
        <div class="card__info sticky top-3 w-full pl-[117px]">
            <h2 class="text-[#212529] font-semibold text-2xl">
                Thanh toán
            </h2>
            <p class="card__total text-[#868E96] text-sm mt-1 number-cart">
                {{ Cart::count() }} sản phẩm
            </p>
            <div class="card__info--body text=[#212529] mt-10">
                <p class="flex items-center flex-wrap mb-4">
                    <span>
                        Tổng hoá đơn
                    </span>
                    <span class="ml-auto total-cart">
                        {{ number_format(Cart::total(),0,'.','.') }}
                    </span>
                </p>
                <p class="flex items-center flex-wrap mb-4">
                    <span>
                        Giao hàng
                    </span>
                    <span class="ml-auto">
                        Miễn phí
                    </span>
                </p>
                <p class="flex items-center flex-wrap mb-4">
                    <span>
                        Mã giảm giá
                    </span>
                    <span class="ml-auto">
                        ---
                    </span>
                </p>

            </div>
            <div class="flex items-center flex-wrap font-bold mt-6 text-[#212529] mb-10">
                <span>
                    Tổng giá trị
                </span>
                <span class="ml-auto total-cart-new">
                {{ number_format(Cart::total(),0,'.','.') }}
                </span>
            </div>
            <div class="information_delivery py-10 border-y border-[#EEEEEE]">
                <h3 class="card__total text-[#212529] text-lg font-bold mb-4">
                    Thông tin giao hàng
                </h3>
                <p class="text-[#424242] text-sm">
                    Vnconcept sẽ giao hàng cho bạn trong vòng 5 - 6 ngay kể từ ngày bạn nhận được cuộc gọi xác nhận từ tổng đài
                </p>
            </div>
            <!-- modal-show="show" modal-data="#formContact" -->
            <div class="card__info--footer mt-10">
                <button type="button" modal-show="show" modal-data="#formContact" class="p-3 w-full hover:opacity-80 transition-all text-white bg-[#232323]">
                    Đặt hàng
                </button>
                <a href="{{ route('home.products') }}" class="h-[46px] w-full mt-4 flex items-center justify-center text-[#232323] py-2 border border-[#232323] hover:bg-[#232323] hover:text-white transition-all">
                    Tiếp tục mua sắm
                </a>
            </div>
        </div>
    @else
    <div class="card__product max-w-[592px] w-full">
        <h1 class="text-[#212529] font-semibold text-2xl mb-9 total-number">
            Giỏ hàng (0)
        </h1>
        <h3 class="text-[#212529]  mb-9 total-number">
            Không có sản phẩm nào trong giỏ hàng
        </h3>
    </div>
    @endif
    </div>

    <div class="bs-modal modal__recruit" id="formContact">
        <div class="modal-frame">
            <div class="content-modal max-w-[527px] w-full">
                <div class="module__contact">
                    <form  action="{{route('home.check-out.post')}}" method="POST" class="contact__body--form tex-[#212529] text-sm bg-white rounded-lg">
                    @csrf    
                        <div class="flex items-center px-6 py-4">
                            <h3 class="text-[#212529] text-base font-medium">
                                Thông tin giao hàng
                            </h3>
                            <span title="close" modal-show="close" class="ml-auto cursor-pointer">
                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.587891 9.875C0.181152 10.2734 0.172852 11.0039 0.596191 11.4272C1.01953 11.8506 1.75 11.834 2.14844 11.4355L6 7.58398L9.85156 11.4272C10.2666 11.8423 10.9805 11.8506 11.4038 11.4189C11.8271 10.9956 11.8271 10.2817 11.4121 9.8667L7.56885 6.02344L11.4121 2.17188C11.8271 1.75684 11.8271 1.04297 11.4038 0.619629C10.9805 0.187988 10.2666 0.196289 9.85156 0.611328L6 4.45459L2.14844 0.603027C1.75 0.20459 1.01953 0.187988 0.596191 0.611328C0.172852 1.03467 0.181152 1.76514 0.587891 2.17188L4.43945 6.02344L0.587891 9.875Z" fill="#212529" />
                                </svg>

                            </span>
                        </div>
                        <div class="py-6 border-y border-[#BFBFBF] px-6 ">
                            <div class="mb-6">
                                <label for="" class="font-semibold mb-1 block">
                                    Họ và tên của bạn
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input type="text" name="name" placeholder="Nhập họ và tên của bạn" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                <span class="fr-error error_name"></span>
                            </div>

                            <div class="mb-6">
                                <label for="" class="font-semibold mb-1 block">
                                    Số điện thoại
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input type="number" name="phone" placeholder="Nhập số điện thoại liên hệ" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                <span class="fr-error error_phone"></span>
                            </div>
                            <div class="mb-6">
                                <label for="" class="font-semibold mb-1 block">
                                    Email
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input type="text" name="email" placeholder="Nhập email cá nhân" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                <span class="fr-error error_email"></span>
                            </div>


                            <div class="grid gap-3  sm:grid-cols-3">
                                <select name="city" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                    <option value="">Tỉnh/Thành phố</option>
                                    @foreach  ($city as $item)
                                    <option value="{{ $item->id_city }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <select name="district" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                    <option value="">Quận/Huyện</option>
                                </select>
                                <select name="ward" class="w-full border border-[#D2D2D2] h-10 rounded text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                    <option value="">Xã/Phường</option>
                                </select>

                            </div>
                            <textarea name="address" placeholder="Nhập địa chỉ cụ thể" class="min-h-[73px]  w-full border border-[#D2D2D2] mt-3  rounded  text-[#212529] placeholder:text-sm text-sm outline-none p-2 placeholder:text-[#868E96]"></textarea>
                            <div class="mt-6">
                                <label for="" class="font-semibold mb-1 block">
                                    Phương thức thanh toán
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <select name="type_pay" class="w-full border border-[#D2D2D2] h-10 rounded text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                    <option value="1">Thanh toán khi nhận hàng</option>
                                </select>
                                <!-- <input type="text" placeholder="Thanh toán khi nhận hàng" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" /> -->
                            </div>
                        </div>
                        <div class="flex items-center py-3 px-6 ">
                            <button title="close" modal-show="close" class="h-7 ml-auto close__modal rounded px-2 py-1 text-[#212529] text-sm border border-[#2C6CD5] mr-3 cursor-pointer">
                                Hủy
                            </button>

                            <button class="h-7 text-white text-sm bg-[#2C6CD5] rounded px-2 py-1 cursor-pointer btn_register">
                                Đăng ký
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        var base_url = '{{url('/')}}';

        ajax_giohang = function(id,qty,url,parent){
            $.ajax({
                url: url,
                type:'GET',
                data: {id:id,qty:qty},
                beforeSend: function() {
                },
                success: function(data) {
                parent.find('.cartitem-price').html(data.price_new);
                $('.total-cart').html(data.total);
                $('.total-cart-new').html(data.total_new);
                $('.number-cart').html(data.count);
                $('.total-number').html(data.total_count);
                $('.error_cart').html(data.error);
                // $('.disabled-click').removeClass();
                }
            });
        }

        $(".icon-minus-next").click(function(e) {
            e.preventDefault();
            var parent = $(this).parents('div.relative');
            var id = parent.find('input[name="get_id_product"]').val();
            var url = parent.find('input[name="get_id_product"]').data('url');
            var qty_old = parent.find('input[name="qty"]');
            // parent.addClass("disabled-click");
            var qty = qty_old.val();
            qty = parseFloat(qty)+1;
            qty_old.val(qty);

            ajax_giohang(id,qty,url,parent);
        });

        $(".icon-minus-pre").click(function(e){
            e.preventDefault();
            var parent = $(this).parents('div.relative');
            var id = parent.find('input[name="get_id_product"]').val();
            var url = parent.find('input[name="get_id_product"]').data('url');
            var qty_old = parent.find('input[name="qty"]');
            // parent.addClass("disabled-click");
            var qty = qty_old.val();
            if(parseFloat(qty) > 1){
                qty =  parseFloat(qty)-1;        
                qty_old.val(qty);
                ajax_giohang(id,qty,url,parent);
            }
            else{
                //alert('Bạn có mún xóa sản phẩm khỏi giỏ hàng');
                // $('.disabled-click').removeClass();
            }
        });

        $('input[name="qty"]').blur(function(){
            var parent = $(this).parents('div.relative');
            var url = parent.find('input[name="get_id_product"]').data('url');
            var id = parent.find('input[name="get_id_product"]').val();
            var qty = $(this).val();
            if(qty !='' && qty > 0){            
                ajax_giohang(id,qty,url,parent);        
            }else{
                alert('Vui lòng nhập số lượng lớn hơn 0');
                $('input[name="qty"]').val(1);
            }
        });

        $('.check-cart').click(function () {
            $.ajax({
                url: "{{ route('home.check-cart') }}",
                type: "GET",
                beforeSend: function() {
                },
                success: function(data) {
                    if (data.message) {
                        confirm(data.message);
                    }
                }
            });
        });

        $('select[name="city"]').on('change', function() {

            var id_city = $(this).val();

            $.ajax({
                url: base_url+'/quan-huyen/'+id_city,
                type:'GET',
                success: function(data) {

                    $('select[name="district"]').html(data);
                
                }
            });
        });

        $('select[name="district"]').on('change', function() {
			var id_district = $(this).val();

			$.ajax({
				url: base_url+'/phuong-xa/'+id_district,
				type:'GET',
				success: function(data) {

					$('select[name="ward"]').html(data);

				}
			});
		});
    </script>
@endsection
