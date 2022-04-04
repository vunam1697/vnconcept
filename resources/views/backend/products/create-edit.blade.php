@extends('backend.layouts.app')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
       	@include('flash::message')
       	<form method="POST">
			@csrf
			@if(isUpdate(@$module['action']))
		        {{ method_field('put') }}
		    @endif
			<div class="row">
                <div class="col-sm-9">
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin sản phẩm</a>
		                    </li>
							<li class="">
		                        <a href="#activity1" data-toggle="tab" aria-expanded="true">Thông tin tồn kho</a>
		                    </li>
		                </ul>
		                <div class="tab-content">

		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
		                    		<div class="col-sm-12">
										<div class="form-group">
		                                    <label>Mã sản phẩm</label>
		                                    <input type="text" class="form-control" name="code" id="code" value="{!! old('code', @$data->code) !!}">
		                                </div>
		                    			<div class="form-group">
		                                    <label>Tên sản phẩm</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name', @$data->name) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Tên khác của sản phẩm</label>
		                                    <input type="text" class="form-control" name="otherName" id="otherName" value="{!! old('otherName', @$data->otherName) !!}">
		                                </div>
                                    </div>
									<div class="col-sm-6">
										<div class="form-group">
		                                    <label>Giá nhập</label>
		                                    <input type="text" class="form-control" name="importPrice" id="importPrice" value="{!! old('importPrice', @$data->importPrice) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Giá Cũ</label>
		                                    <input type="text" class="form-control" name="oldPrice" id="oldPrice" value="{!! old('oldPrice', @$data->oldPrice) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Giá bán lẻ</label>
		                                    <input type="text" class="form-control" name="price" id="price" value="{!! old('price', @$data->price) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Giá bán buôn</label>
		                                    <input type="text" class="form-control" name="wholesalePrice" id="wholesalePrice" value="{!! old('wholesalePrice', @$data->wholesalePrice) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>% thuế giá trị gia tăng</label>
		                                    <input type="text" class="form-control" name="vat" id="vat" value="{!! old('vat', @$data->vat) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Số điện thoại bảo hành</label>
		                                    <input type="text" class="form-control" name="warrantyPhone" id="warrantyPhone" value="{!! old('warrantyPhone', @$data->warrantyPhone) !!}">
		                                </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
		                                    <label>Chiều rộng (cm)</label>
		                                    <input type="text" class="form-control" name="width" id="width" value="{!! old('width', @$data->width) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Chiều dài (cm)</label>
		                                    <input type="text" class="form-control" name="length" id="length" value="{!! old('length', @$data->length) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Chiều cao (cm)</label>
		                                    <input type="text" class="form-control" name="height" id="height" value="{!! old('height', @$data->height) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Đơn vị tính</label>
		                                    <input type="text" class="form-control" name="unit" id="unit" value="{!! old('unit', @$data->unit) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Trọng lượng vận chuyển (gram)</label>
		                                    <input type="text" class="form-control" name="shippingWeight" id="shippingWeight" value="{!! old('shippingWeight', @$data->shippingWeight) !!}">
		                                </div>
										<div class="form-group">
		                                    <label>Số tháng bảo hành</label>
		                                    <input type="text" class="form-control" name="warranty" id="warranty" value="{!! old('warranty', @$data->warranty) !!}">
		                                </div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
		                                    <label>Địa chỉ bảo hành</label>
		                                    <input type="text" class="form-control" name="warrantyAddress" id="warrantyAddress" value="{!! old('warrantyAddress', @$data->warrantyAddress) !!}">
		                                </div>
										<div class="form-group">
											<label for="">Mô tả ngắn</label>
											<textarea name="description" class="form-control" rows="5">{{ old('description', @$data->description) }}</textarea>
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea name="content" class="content">{{ old('content', @$data->content) }}</textarea>
										</div>
									</div>
		                    	</div>
		                    </div>

							<div class="tab-pane" id="activity1">
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>số lượng tồn kho</th>
													<th>số lượng đang giao hàng</th>
													<th>số lượng đang tạm giữ</th>
													<th>số lượng lỗi</th>
													<th>Số lượng có thể bán</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{ $data->inventory->remain }}</td>
													<td>{{ $data->inventory->shipping }}</td>
													<td>{{ $data->inventory->holding }}</td>
													<td>{{ $data->inventory->damaged }}</td>
													<td>{{ $data->inventory->available }}</td>
												</tr>
											</tbody>
										</table>
										<div class="form-group">
											<label for="">Tồn tại từng kho</label>
										</div>
										@if (!empty(@$data->inventory->depots))
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th>STT</th>
														<th>số lượng tồn kho</th>
														<th>số lượng đang giao hàng</th>
														<th>số lượng đang tạm giữ</th>
														<th>số lượng lỗi</th>
														<th>Số lượng có thể bán</th>
													</tr>
												</thead>
												<tbody>
													@foreach (@$data->inventory->depots as $item)
														<tr>
															<td>{{ $loop->index + 1 }}</td>
															<td>{{ $item->remain }}</td>
															<td>{{ $item->shipping }}</td>
															<td>{{ $item->holding }}</td>
															<td>{{ $item->damaged }}</td>
															<td>{{ $item->available }}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										@endif
									</div>
								</div>
							</div>
							
		                </div>
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng sản phẩm</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group">
                                {{-- <label class="custom-checkbox">
		                        	@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="status" value="1" {{ @$data->status == 1 ? 'checked' : null }}> Hiển thị
		                            @else
		                            	<input type="checkbox" name="status" value="1" checked> Hiển thị
		                            @endif
		                        </label> --}}
								<label class="custom-checkbox">
									@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="showHot" value="1" {{ @$data->showHot === 1 ? 'checked' : null }}>Sản phẩm hot
		                            @else
		                            	<input type="checkbox" name="showHot" value="1"> Sản phẩm hot
		                            @endif
		                        </label>
								<label class="custom-checkbox">
									@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="showNew" value="1" {{ @$data->showNew === 1 ? 'checked' : null }}>Sản phẩm mới
		                            @else
		                            	<input type="checkbox" name="showNew" value="1"> Sản phẩm mới
		                            @endif
		                        </label>
                                <label class="custom-checkbox">
		                        	@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="showHome" value="1" {{ @$data->showHome == 1 ? 'checked' : null }}> Hiển thị trang chủ
		                            @else
		                            	<input type="checkbox" name="showHome" value="1"> Hiển thị trang chủ
		                            @endif
		                        </label>
		                    </div>
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
		                    </div>
		                </div>
		            </div>

		            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ảnh sản phẩm</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group" style="text-align: center;">
		                        <div class="image">
		                            <div class="image__thumbnail">
		                                <img src="{{ !empty(@$data->image) ? @$data->image : __IMAGE_DEFAULT__ }}"
		                                     data-init="{{ __IMAGE_DEFAULT__ }}">
		                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
		                                    <i class="fa fa-times"></i></a>
		                                <input type="hidden" value="{{ old('image', @$data->image) }}" name="image"/>
		                                <div class="image__button" onclick="fileSelect(this)">
		                                	<i class="fa fa-upload"></i>
		                                    Upload
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



