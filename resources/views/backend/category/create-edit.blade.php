@extends('backend.layouts.app')
@section('controller', 'Danh mục sản phẩm' )
@section('controller_route', route('category.index'))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
					@csrf
					@if(isUpdate(@$module['action']))
				        {{ method_field('put') }}
				    @endif
				    <div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Danh mục sản phẩm</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane active" id="activity">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="">Hình ảnh</label>
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
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="">Banner</label>
                                                <div class="image">
                                                <div class="image__thumbnail">
                                                    <img src="{{ !empty(@$data->banner) ? @$data->banner : __IMAGE_DEFAULT__ }}"
                                                            data-init="{{ __IMAGE_DEFAULT__ }}">
                                                    <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
                                                        <i class="fa fa-times"></i></a>
                                                    <input type="hidden" value="{{ old('banner', @$data->banner) }}" name="banner"/>
                                                    <div class="image__button" onclick="fileSelect(this)">
                                                        <i class="fa fa-upload"></i>
                                                        Upload
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        @if (!empty(@$data->parentId))
                                        <div class="form-group">
                                            <label for="">Danh mục cha</label>
                                            <input type="text" class="form-control" value="{{ $data->getParent()->name }}" readonly>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="">Mã danh mục</label>
                                            <input type="text" class="form-control" name="code" id="code" value="{{ old('code', @$data->code) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên danh mục</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', @$data->name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Đường dẫn tĩnh</label>
                                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', @$data->slug) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea class="form-control" name="content" rows="5">{!! old('content', @$data->content) !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="custom-checkbox">
                                                <input type="checkbox" name="showHome" value="1" {{ @$data->showHome == 1 ? 'checked' : null }}> Hiển thị trang chủ
                                            </label>
                                        </div>
                                    </div>
                                </div>
		                    </div>

		                    <button type="submit" class="btn btn-primary">Lưu lại</button>
		                </div>
		            </div>
				</form>
			</div>
		</div>
	</div>
@stop
