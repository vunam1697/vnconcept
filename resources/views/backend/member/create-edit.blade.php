@extends('backend.layouts.app')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
       	@include('flash::message')
       	<form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
			@csrf
			@if(isUpdate(@$module['action']))
		        {{ method_field('put') }}
		    @endif
			<div class="row">
                <div class="col-sm-12">
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin</a>
		                    </li>
		                </ul>
		                <div class="tab-content">

		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
		                                    <label>Họ và tên</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name', @$data->name) !!}">
		                                </div>
										<div class="form-group">
											<label for="">Số điện thoại</label>
											<input type="text" class="form-control" name="phone" id="phone" value="{!! old('phone', @$data->phone) !!}">
										</div>
										<div class="form-group">
											<label for="">Email</label>
											<input type="text" class="form-control" name="email" id="email" value="{!! old('email', @$data->email) !!}">
										</div>
										<div class="form-group">
											<label for="">Nhà phân phối</label>
											<select name="manufacture" id="manufacture" class="form-control">
												<option value="">Chọn nhà phân phối</option>
												@if (!empty($manufacture))
												@foreach ($manufacture as $item)
													<option value="{{ $item->id }}" {{ $item->id == @$data->id_manufacture ? 'selected' : '' }}>{{ $item->name }}</option>
												@endforeach
												@endif
											</select>
										</div>
										<label for="">Ngày tháng năm sinh</label>
                                    </div>
									<div class="col-sm-4">
										<div class="form-group">
											<select name="date_of_birth" id="date_of_birth" class="form-control">
												@foreach ($day as $item)
													<option value="{{ $item }}" {{ $item == @$data->date_of_birth ? 'selected' : '' }}>{{ $item }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select name="month_of_birth" id="month_of_birth" class="form-control">
												@foreach ($month as $item)
													<option value="{{ $item }}" {{ $item == @$data->month_of_birth ? 'selected' : '' }}>{{ $item }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select name="year_of_birth" id="year_of_birth" class="form-control">
												@foreach ($year as $item)
													<option value="{{ $item }}" {{ $item == @$data->year_of_birth ? 'selected' : '' }}>{{ $item }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<label for="">Địa chỉ liên hệ</label>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control multislt-city" name="id_city" id="city">
												<option value="">Chọn tỉnh / thành phố</option>
												@foreach ($city as $item)
													<option value="{{ $item->id_city }}"
														{{ $item->id_city == old('city', @$data->id_city) ? 'selected' : '' }}>{{ $item->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<?php
												$district = getDistrict(@$data->id_city);
												$ward = getWard(@$data->id_district);
											?>
											<select class="form-control multislt-district" name="id_district" id="district">
												<option value="">Chọn quận / huyện</option>
												@if(!empty($data->id_district))
													@foreach ($district as $item)
														<option value="{{ $item->id_district }}" {{ $item->id_district == @$data->id_district ? 'selected' : '' }}>{{ $item->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control multislt-ward" name="id_ward" id="ward">
												<option value="">Chọn phường / xã</option>
												@if(!empty($data->id_ward))
													@foreach ($ward as $item)
														<option value="{{ $item->id_ward }}" {{ $item->id_ward == @$data->id_ward ? 'selected' : '' }}>{{ $item->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<textarea name="address" id="address" class="form-control" placeholder="Nhập địa chỉ cụ thể" rows="5">{{ old('address', @$data->address) }}</textarea>
										<div class="form-group">
											<label class="custom-checkbox">
												@if(isUpdate(@$module['action']))
													<input type="checkbox" name="status" value="1" {{ @$data->status == 1 ? 'checked' : null }}> Hoạt động
												@else
													<input type="checkbox" name="status" value="1" checked> Hoạt động
												@endif
											</label>
										</div>
										<div class="form-group">
											<label for="" style="color: red">Mật khẩu mặc định: 123456@!</label>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
										</div>
									</div>
		                    	</div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</form>
	</div>

@stop

@section('scripts')
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

@section('css')
@endsection

