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
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin Rooms</a>
		                    </li>
							<li class="">
		                        <a href="#activity1" data-toggle="tab" aria-expanded="true">Danh sách sản phẩm</a>
		                    </li>
		                </ul>
		                <div class="tab-content">

		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
		                                    <label>Tiêu đề</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name', @$data->name) !!}">
		                                </div>
                                        <div class="form-group">
		                                    <label>Đường dẫn tĩnh</label>
		                                    <input type="text" class="form-control" name="slug" id="slug" value="{!! old('slug', @$data->slug) !!}">
		                                </div>
                                        <div class="form-group">
											<label for="">Mô tả</label>
											<textarea name="content" class="form-control" rows="6">{!! old('content', @$data->content) !!}</textarea>
										</div>
                                    </div>
		                    	</div>
		                    </div>

							<div class="tab-pane" id="activity1">
                                <div class="row">
                                    <?php $list_product = json_decode(@$data->list_product) ?>
                                    @foreach ($products as $item)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="custom-checkbox">
                                                <input type="checkbox" value="{{ $item->id }}" @if (!empty($list_product)) {{ in_array($item->id, @$list_product) ? 'checked' : '' }} @endif name="productId[]">
                                            </label>    
                                        </div>
										<div class="form-group">
                                            <img src="{{ $item->image }}" width="100" height="100px" alt="{{ $item->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ $item->name }}</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ number_format($item->price, 0, '.', '.') }}</label>
                                        </div>
									</div>
                                    @endforeach
								</div>
							</div>
							
		                </div>
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng rooms</h3>
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
		                    </div>
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
		                    </div>
		                </div>
		            </div>

                    <div class="box box-success category-box">

		                <div class="box-header with-border">

		                    <h3 class="box-title">Danh mục Rooms </h3>

		                </div>

		                <div class="box-body checkboxlist">

		                    @if (!empty($categories))

		                        @foreach ($categories as $item)

		                            @if ($item->parentId == 0)

		                                <label class="custom-checkbox">

		                                    <input type="checkbox" class="category" name="categoryId" value="{{ $item->id }}" {{ $item->id == @$data->categoryId ? 'checked' : null }}> {{ $item->name }}

		                                 </label>

		                                 <?php checkBoxCategoryRooms( $categories, $item->id, $item, @$data->categoryId ) ?>

		                            @endif

		                        @endforeach

		                    @endif

		                </div>

		            </div>

		            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Hình ảnh</h3>
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



