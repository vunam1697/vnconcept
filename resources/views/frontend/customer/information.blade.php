@extends('frontend.customer.master')
@section('title')
    vncpncept - Thông tin tài khoản
@endsection
@section('main')
    <main id="main">
        <div class="page__admin flex flex-wrap items-start">
            @include('frontend.customer.components.menu-left')

            <div class="admin__main max-w-[calc(100%_-_256px)] w-full bg-white  flex flex-col h-screen">


                <div class="admin__main-body px-5 lg:py-[100px]">
                    <form action="{{ route('admin.post-information') }}" method="POST" class="contact__body--form max-w-[479px] w-full mx-auto tex-[#212529] text-sm bg-white rounded-lg">
                        @csrf
                        <div class="py-6">
                            <div class="mb-10">
                                <label for="" class="font-semibold mb-1 block">
                                    Số điện thoại
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input value="{{ old('phone', $member->phone) }}" name="phone" type="number" placeholder="Nhập số điện thoại liên hệ" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                @if ($errors->has('phone'))
                                    <span class="fr-error">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="mb-10">

                                <label for="" class="font-semibold mb-1 block">
                                    Họ và tên của bạn
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input value="{{ old('name', $member->name) }}" name="name" type="text" placeholder="Nhập họ và tên của bạn" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                @if ($errors->has('name'))
                                    <span class="fr-error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>


                            <div class="mb-10">
                                <label for="" class="font-semibold mb-1 block">
                                    Email liên hệ
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <input type="text" value="{{ old('email', $member->email) }}" name="email" placeholder="Nhập email cá nhân" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] placeholder:text-sm text-sm outline-none px-3 placeholder:text-[#868E96]" />
                                @if ($errors->has('email'))
                                    <span class="fr-error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-10">
                                <label for="" class="font-semibold mb-1 block">
                                    Ngày tháng năm sinh
                                    <sup class="text-red-500 ">*</sup>
                                </label>
                                <div class="grid gap-3 sm:grid-cols-3">
                                    <select name="date_of_birth" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                        @foreach ($day as $item)
                                            <option value="{{ $item }}" {{ $item == @$member->date_of_birth ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <select name="month_of_birth" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                        @foreach ($month as $item)
                                            <option value="{{ $item }}" {{ $item == @$member->month_of_birth ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <select name="year_of_birth" class="w-full border border-[#D2D2D2] h-10 rounded text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                        @foreach ($year as $item)
                                            <option value="{{ $item }}" {{ $item == @$member->year_of_birth ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div>
                                <label for="" class="font-semibold mb-1 block">
                                    Ngày tháng năm sinh
                                    <sup class="text-red-600 ">*</sup>
                                </label>
                                <div class="grid gap-3 sm:grid-cols-3">
                                    <select name="id_city" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                        <option value="">Tỉnh/Thành phố</option>
                                        @foreach ($city as $item)
                                            <option value="{{ $item->id_city }}"
                                                {{ $item->id_city == old('city', @$member->id_city) ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <?php
                                        $district = getDistrict(@$member->id_city);
                                        $ward = getWard(@$member->id_district);
                                    ?>
                                    <select name="id_district" class="w-full border border-[#D2D2D2] h-10 rounded  text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                        <option value="">Quận/Huyện</option>
                                        @if(!empty($member->id_district))
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id_district }}" {{ $item->id_district == @$member->id_district ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <select name="id_ward" class="w-full border border-[#D2D2D2] h-10 rounded text-[#212529] text-sm outline-none placeholder:text-[#868E96] select">
                                        <option value="">Xã/Phường</option>
                                        @if(!empty($member->id_ward))
                                            @foreach ($ward as $item)
                                                <option value="{{ $item->id_ward }}" {{ $item->id_ward == @$member->id_ward ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                @if ($errors->has('id_city'))
                                    <p class="fr-error">{{ $errors->first('id_city') }}</p>
                                @endif
                                @if ($errors->has('id_district'))
                                    <p class="fr-error">{{ $errors->first('id_district') }}</p>
                                @endif
                                @if ($errors->has('id_ward'))
                                    <p class="fr-error">{{ $errors->first('id_ward') }}</p>
                                @endif
                            </div>
                            <textarea name="address" placeholder="Nhập địa chỉ cụ thể" class="min-h-[73px]  w-full border border-[#D2D2D2] mt-3  rounded  text-[#212529] placeholder:text-sm text-sm outline-none p-2 placeholder:text-[#868E96]">{{ old('address', @$member->address) }}</textarea>
                            @if ($errors->has('address'))
                                <span class="fr-error">{{ $errors->first('address') }}</span>
                            @endif
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
