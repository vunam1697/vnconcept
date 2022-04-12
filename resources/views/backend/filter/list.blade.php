@extends('backend.layouts.app') 
@section('controller','Filter')
@section('controller_route', route('list-category-filter'))
@section('action','Danh sách')
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
           		@include('flash::message')
           		<div class="btnAdd">
           			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Bộ lọc
					</button>
           		</div>
           		<table id="example1" class="table table-bordered table-striped table-hover">
			        <thead>
			          	<tr>
			              	<th width="30px">STT</th>
			              	<th>Tên bộ lọc</th>
			              	<th>Hiển thị</th>
			              	<th width="150px">Thao tác</th>
			          	</tr>
			        </thead>
		          	<tbody>
		              	@foreach ($data as $item)
		              		<tr>
		              			<td>{{ $loop->index + 1 }}</td>
		              			<td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->categoryId == 0)
                                        <label class="label label-success">Tất cả sản phẩm</label>
                                    @else 
                                        <label class="label label-success">{{ $item->category->name }}</label>
                                    @endif
                                </td>
		              			<td>
		              				<a href="{{ route('filter.edit', [ 'id' => $item->id ]) }}" class="btn btn-success btn-sm">Xây dựng bộ lọc</a>
		              				 &nbsp; &nbsp; &nbsp;
                                      <a href="javascript:void(0);" class="btn-destroy" 
                                      data-href="{{ route( 'filter.destroy',  $item->id ) }}"
                                      data-toggle="modal" data-target="#confim">
                                      <i class="fa fa-trash-o fa-fw"></i> Xóa
                                    </a>
		              			</td>
		              		</tr>
		              	@endforeach
		          	</tbody>
		      	</table>
           	</div>   
        </div>
    </div>



    <!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	        	<form action="{{ route('filter.store') }}" method="POST">
	        		@csrf
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Thêm bộ lọc</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                <input type="hidden" name="categoryId" value="{{ request()->get('category') }}">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="custom-checkbox">
                                    <input type="checkbox" value="Giá" name="name[]" {{ in_array('Giá', $attributes) ? 'checked' : '' }}> Giá
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="custom-checkbox">
                                    <input type="checkbox" value="Màu sắc" name="name[]" {{ in_array('Màu sắc', $attributes) ? 'checked' : '' }}> Màu sắc
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="custom-checkbox">
                                    <input type="checkbox" value="Bộ sưu tập" name="name[]" {{ in_array('Bộ sưu tập', $attributes) ? 'checked' : '' }}> Bộ sưu tập
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="custom-checkbox">
                                    <input type="checkbox" value="Nhà thiết kế" name="name[]" {{ in_array('Nhà thiết kế', $attributes) ? 'checked' : '' }}> Nhà thiết kế
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="custom-checkbox">
                                    <input type="checkbox" value="Chất liệu" name="name[]" {{ in_array('Chất liệu', $attributes) ? 'checked' : '' }}> Chất liệu
                                </label>
                            </div>
                        </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                <button type="submit" class="btn btn-primary">Lưu lại</button>
		            </div>
	            </form>
	        </div>
	    </div>
	</div>
@stop