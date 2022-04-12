@extends('backend.layouts.app')
@section('controller', 'Danh mục collection' )
@section('controller_route', route('category-collection.index'))
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
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Danh mục collection</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane active" id="activity">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Tên danh mục</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', @$data->name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Đường dẫn tĩnh</label>
                                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', @$data->slug) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Module cha</label>
                                            <select name="parentId" id="parentId" class="form-control">
                                                <option value="0">Module cha</option>
                                                    <?php menuMulti( $categories , 0 , '' ,   old( 'parentId', @$data->parentId )); ?>
                                            </select>
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
