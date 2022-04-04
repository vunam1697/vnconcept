@extends('backend.layouts.app')
@section('controller','Liên hệ')
@section('controller_route',route('get.list.contact'))
@section('action','Chi tiết')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
				<form action="{{ route('contact.post', $data->id) }}" method='POST' enctype="multipart/form-data" name="frmEditProduct">
			        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

			        <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin Liên hệ</a></li>
			            </ul>
			            <div class="tab-content">
			                <div class="tab-pane active" id="activity">
			                    <div class="row">
			                        <div class="col-lg-6">
			                        	<div class="table-responsive">
							               <table class="table no-margin">
							                  <thead>
								                    <tr>
								                        <th>#</th>
								                        <th>Nội dung</th>
								                    </tr>
							                  </thead>
							                  <tbody>
			                                        <tr>
			                                            <td>Tiêu đề</td>
			                                            <td>{{ $data->title }}</td>
			                                        </tr>
			                                        <tr>
			                                            <td>Nội dung</td>
			                                            <td>{{ $data->content }}</td>
			                                        </tr>
			                                        @if (!empty($data->link_product))
			                                        	<tr>
				                                            <td>Sản phẩm</td>
				                                            <td><a href="{{ $data->link_product }}" target="_blank">{{ $data->link_product }}</a></td>
				                                        </tr>
			                                        @endif
							                  </tbody>
							               </table>
							            </div>
			                        </div>
			                        <div class="col-lg-6">
			                            <div class="form-group">
			                                <label>Họ tên</label>
			                                <input type="text" class="form-control" name="name" id="name"
			                                       value="{!! old('name', isset($data) ? $data->customer->name : null) !!}" readonly>
			                            </div>

			                            <div class="form-group">
			                                <label>Số điện thoại</label>
			                                <input type="text" class="form-control" name="phone" id="phone"
			                                       value="{!! old('phone', isset($data) ? $data->customer->phone : null) !!}" readonly>
			                            </div>

		                                <div class="form-group">
		                                    <label>Địa chỉ vận chuyển</label>
		                                    <textarea class="form-control" name="address_from" readonly="">{{ @$data->address_from }}</textarea>
		                                </div>

                                        <div class="form-group">
		                                    <label>Địa chỉ giao</label>
		                                    <textarea class="form-control" name="address_to" id="address_to" readonly="">{{ @$data->address_to }}</textarea>
		                                </div>

                                        <div class="form-group">
			                                <label>Thời gian</label>
			                                <input type="text" class="form-control" name="time" id="time"
			                                       value="{!! @$data->time !!}" readonly>
			                            </div>

			                            <div class="form-group">
			                                <label class="text-danger">Trạng thái</label> <br>
			                                <input type="checkbox" name="status" value="1" id="active" checked>
			                                <label for="active" class="lbl">Đã xem</label>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <button type="submit" class="btn btn-primary">Cập nhật</button>
			    </form>
            </div>
        </div>
    </div>
@stop
