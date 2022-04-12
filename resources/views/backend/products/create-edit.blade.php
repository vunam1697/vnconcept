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
                <div class="col-sm-9">
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin sản phẩm</a>
		                    </li>
                            @if (!empty($inventory))
							<li class="">
		                        <a href="#activity1" data-toggle="tab" aria-expanded="true">Thông tin tồn kho</a>
		                    </li>
                            @endif
                            <li @if(session('active_tab')=='thuoc-tinh') class="active" @endif data-tab="thuoc-tinh">

		                    	<a href="#attributes" data-toggle="tab" aria-expanded="true">Thuộc tính</a>

		                    </li>
                            <li class="">
                                <a href="#specifications" data-toggle="tab" aria-expanded="true">Thông số kỹ thuật</a>
                            </li>
		                </ul>
		                <div class="tab-content">

		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
		                    		<div class="col-sm-12">
										<div class="form-group">
		                                    <label>Mã sản phẩm</label>
		                                    <input type="text" class="form-control" name="code" id="code" value="{!! old('code', @$data->code) !!}" @if(isUpdate(@$module['action'])) readonly @endif>
		                                </div>
		                    			<div class="form-group">
		                                    <label>Tên sản phẩm</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name', @$data->name) !!}">
		                                </div>
                                        <div class="form-group">
                                            <label for="">Đường dẫn tĩnh</label>
                                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', @$data->slug) }}">
                                        </div>
										<div class="form-group">
		                                    <label>Tên khác của sản phẩm</label>
		                                    <input type="text" class="form-control" name="otherName" id="otherName" value="{!! old('otherName', @$data->otherName) !!}">
		                                </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
		                                    <label>Giá bán</label>
		                                    <input type="text" class="form-control" name="price" id="price" value="{!! old('price', @$data->price) !!}">
		                                </div>
                                    </div>

                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
		                                    <label>Giá khuyến mãi</label>
		                                    <input type="text" class="form-control" name="sale_price" id="sale_price" value="{!! old('sale_price', @$data->sale_price) !!}">
		                                </div>
                                    </div> -->
                                    <div class="col-sm-12">
                                        <div class="form-group">
											<label for="">Mô tả ngắn</label>
											<textarea name="description" class="form-control" rows="3">{{ old('description', @$data->description) }}</textarea>
										</div>
                                        <div class="form-group">
											<label for="">Mô tả</label>
											<textarea name="content" class="content">{{ old('content', @$data->content) }}</textarea>
										</div>


                                    </div>
		                    	</div>
		                    </div>
                            @if (!empty($inventory))
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
                                            @foreach ($inventory as $item)
                                                @if ($item->depotId == NULL)
												<tr>
													<td>{{ $item->remain }}</td>
													<td>{{ $item->shipping }}</td>
													<td>{{ $item->holding }}</td>
													<td>{{ $item->damaged }}</td>
													<td>{{ $item->available }}</td>
												</tr>
                                                @endif
                                            @endforeach
											</tbody>
										</table>
										<div class="form-group">
											<label for="">Tồn tại từng kho</label>
										</div>
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
                                            @foreach ($inventory as $item)
                                                @if ($item->depotId != NULL)
                                                <tr>
                                                    <td>{{ $loop->index }}</td>
                                                    <td>{{ $item->remain }}</td>
                                                    <td>{{ $item->shipping }}</td>
                                                    <td>{{ $item->holding }}</td>
                                                    <td>{{ $item->damaged }}</td>
                                                    <td>{{ $item->available }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
									</div>
								</div>
							</div>
                            @endif

                            <div class="tab-pane @if(session('active_tab')=='thuoc-tinh') active @endif" id="attributes">

		                    	<div class="row">

					                <div class="col-sm-12">
                                        <div class="form-group">
		                                    <label>Màu sắc</label>
                                            <input type="text" class="form-control" name="color" value="{{ old('color', @$data->color) }}">
                                        </div>
                                        <div class="form-group">
		                                    <label>Bộ sưu tập</label>
                                            <input type="text" class="form-control" name="collection" value="{{ old('collection', @$data->collection) }}">
                                        </div>
                                        <div class="form-group">
		                                    <label>Nhà thiết kế</label>
                                            <input type="text" class="form-control" name="designer" value="{{ old('designer', @$data->designer) }}">
                                        </div>
                                        <div class="form-group">
		                                    <label>Chất liệu</label>
                                            <input type="text" class="form-control" name="fabric_material" value="{{ old('fabric_material', @$data->fabric_material) }}">
                                        </div>
						            </div>

		                    	</div>

		                    </div>

                            <div class="tab-pane" id="specifications">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="specification" class="content">{!! old('specification', @$data->specification) !!}</textarea>
                                        </div>
                                        <div class="form-group">
											<label for="">Chi tiết sản phẩm</label>
                                            <?php $detailProduct = json_decode(@$data->detailProduct) ?>
											<div class="repeater" id="repeater">
                                                <table class="table table-bordered table-hover detail-product">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 30px">STT</th>
                                                            <th>Tiêu đề</th>
                                                            <th>Nội dung</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="sortable">
                                                        @if (!empty($detailProduct))
                                                            @foreach ($detailProduct as $key => $value)
                                                                <?php $index = $loop->index + 1 ; ?>
                                                                @include('backend.repeater.row-detail_product')
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <div class="text-right">
                                                    <button class="btn btn-primary"
                                                        onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'detail_product', '.detail-product')">Thêm
                                                    </button>
                                                </div>
                                            </div>
										</div>
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
                                <label class="custom-checkbox">
		                        	@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="status" value="1" {{ @$data->status == 1 ? 'checked' : null }}> Hiển thị
		                            @else
		                            	<input type="checkbox" name="status" value="1" checked> Hiển thị
		                            @endif
		                        </label>
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

                    <div class="box box-success category-box">

		                <div class="box-header with-border">

		                    <h3 class="box-title">Danh mục sản phẩm </h3>

		                </div>

		                <div class="box-body checkboxlist">

		                    @if (!empty($categories))

		                        @foreach ($categories as $item)

		                            @if ($item->parentId == 0)

		                                <label class="custom-checkbox">

		                                    <input type="checkbox" class="category" name="categoryId" value="{{ $item->categoryId }}" {{ $item->categoryId == @$data->categoryId ? 'checked' : null }}> {{ $item->name }}

		                                 </label>

		                                 <?php checkBoxCategory( $categories, $item->categoryId, $item, @$data->categoryId ) ?>

		                            @endif

		                        @endforeach

		                    @endif

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



