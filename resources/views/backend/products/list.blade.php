@extends('backend.layouts.app')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', 'Danh sách')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <form action="{!! route($module['module'].'.postMultiDel') !!}" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="btnAdd">
                        <a href="{{ route($module['module'].'.create') }}">
                            <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</fa>
                        </a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
                            <i class="fa fa-trash-o"></i> Xóa
                        </button>
                        <a href="{{ route($module['module'].'.sync-data') }}">
                            <fa class="btn btn-success"><i class="fa fa-plus"></i> Đồng bộ dữ liệu</fa>
                        </a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá bán lẻ</th>
                                <th>Danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="odd">
                                    <td><input type="checkbox" name="chkItem[]" value="{{ $item->idNhanh }}"></td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                    @if (!empty($item->image))
                                        <img src="{{ $item->image }}" class="img-thumbnail" width="50px" height="50px">
                                    @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->price, 0, '.','.') }}</td>
                                    <td><span class="label label-success">{{ $item->brandName }}</span></td>
                                    <td>
                                        <a href="{{ route('products.edit', $item->idNhanh) }}" title="Sửa"> <i class="fa fa-pencil fa-fw"></i> Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop

