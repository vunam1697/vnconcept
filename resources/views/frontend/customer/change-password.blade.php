@extends('frontend.customer.master')
@section('title')
    vncpncept - Thay đổi mật khẩu
@endsection
@section('main')
    <main id="main">
        <div class="page__admin flex flex-wrap items-start">
            @include('frontend.customer.components.menu-left')

            <div class="admin__main max-w-[calc(100%_-_256px)] w-full bg-white  flex flex-col h-screen">


                <div class="admin__main-body px-5 lg:py-[100px]">
                    <form action="{{ route('admin.post-change-password') }}" method="POST" class="contact__body--form max-w-[479px] w-full mx-auto tex-[#212529] text-sm bg-white rounded-lg">
                        @csrf
                        <div class="py-6">
                            <div class="mb-10">
                                <label for="" class="font-semibold mb-1 block">
                                    Mật khẩu hiện tại

                                </label>
                                <input type="password" name="old_password" placeholder="Nhập mật khẩu hiện tại" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                @error('old_password')
                                    <span class="fr-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-10">

                                <label for="" class="font-semibold mb-1 block">
                                    Mật khẩu mới
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input type="password" name="newpassword" placeholder="Nhập mật khẩu mới" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                @error('newpassword')
                                    <span class="fr-error">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-10">
                                <label for="" class="font-semibold mb-1 block">
                                    Nhập lại mật khẩu mới
                                </label>
                                <input type="password" name="repassword" placeholder="Nhập lại mật khẩu mới" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                @error('repassword')
                                    <span class="fr-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-[10px]">
                                <label for="" class="font-semibold mb-1 block">
                                    Cho phép đăng xuất khỏi tất cả các thiết bị
                                </label>
                                <select class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                    <option value="1">
                                        Có
                                    </option>
                                    <option value="2">
                                        Không
                                    </option>
                                </select>
                            </div>
                            <div class="text-[#212529] rounded-[5px] text-[9px] flex items-center border py-[2px] px-3 border-[#FFA030]">
                                <span class="w-4 h-4 flex-shrink-0">
                                    <svg width="12" height="15" viewbox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.86328 14.1533C5.97266 14.1533 6.15039 14.1123 6.32129 14.0166C10.2109 11.8359 11.5439 10.9131 11.5439 8.41797V3.18848C11.5439 2.4707 11.2363 2.24512 10.6553 1.99902C9.84863 1.66406 7.24414 0.727539 6.4375 0.447266C6.25293 0.385742 6.05469 0.344727 5.86328 0.344727C5.67188 0.344727 5.47363 0.399414 5.2959 0.447266C4.48926 0.679688 1.87793 1.6709 1.07129 1.99902C0.49707 2.23828 0.182617 2.4707 0.182617 3.18848V8.41797C0.182617 10.9131 1.52246 11.8291 5.40527 14.0166C5.58301 14.1123 5.75391 14.1533 5.86328 14.1533ZM5.86328 12.916C5.75391 12.916 5.64453 12.875 5.43945 12.752C2.28125 10.8379 1.26953 10.2773 1.26953 8.16504V3.40039C1.26953 3.16797 1.31055 3.0791 1.50195 3.00391C2.54102 2.59375 4.55762 1.91699 5.58984 1.50684C5.69922 1.45898 5.78809 1.44531 5.86328 1.44531C5.93848 1.44531 6.02734 1.46582 6.13672 1.50684C7.16895 1.91699 9.17188 2.6416 10.2314 3.00391C10.416 3.07227 10.457 3.16797 10.457 3.40039V8.16504C10.457 10.2773 9.44531 10.8311 6.28711 12.752C6.08887 12.875 5.97266 12.916 5.86328 12.916ZM5.86328 8.15137C6.18457 8.15137 6.37598 7.9668 6.38281 7.61133L6.48535 4.00195C6.49219 3.65332 6.21875 3.39355 5.85645 3.39355C5.4873 3.39355 5.22754 3.64648 5.23438 3.99512L5.32324 7.61133C5.33008 7.95996 5.52148 8.15137 5.86328 8.15137ZM5.86328 10.373C6.25293 10.373 6.59473 10.0586 6.59473 9.66211C6.59473 9.26562 6.25977 8.95117 5.86328 8.95117C5.45996 8.95117 5.125 9.27246 5.125 9.66211C5.125 10.0518 5.4668 10.373 5.86328 10.373Z" fill="#FFA030" />
                                    </svg>

                                </span>
                                Thay đổi mật khẩu có thể bắt buộc yêu cầu bạn phải đăng nhập lại trên tất cả các thiết bị mobiles
                            </div>
                        </div>
                        <div class="flex items-center py-3 px-6 ">
                            <button title="close" modal-show="close" class="h-7 ml-auto close__modal rounded px-2 py-1 text-[#212529] text-sm border border-[#2C6CD5] mr-3 cursor-pointer">
                                Hủy
                            </button>

                            <button type="submit" class="h-7 text-white text-sm bg-[#2C6CD5] rounded px-2 py-1 cursor-pointer">
                                Lưu
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
	<script>
		var base_url = '{{ url('/') }}';

        $('select[name="id_city"]').on('change', function() {
            var id_city = $(this).val();

            $.ajax({
                url: base_url+'/quan-huyen/'+id_city,
                type:'GET',
                success: function(data) {

                    $('select[name="id_district"]').html(data);

                }
            });
        });

		$('select[name="id_district"]').on('change', function() {
			var id_district = $(this).val();

			$.ajax({
				url: base_url+'/phuong-xa/'+id_district,
				type:'GET',
				success: function(data) {

					$('select[name="id_ward"]').html(data);

				}
			});
		});
	</script>

@endsection
