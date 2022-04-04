@extends('backend.layouts.app')
@section('controller', 'Danh mục sản phẩm')
@section('controller_route', route('category.index'))
@section('action', 'Danh sách')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <div class="btnAdd">
                    <a href="{{ route('category.sync-data') }}">
                        <fa class="btn btn-primary"><i class="fa fa-plus"></i> Đồng bộ dữ liệu</fa>
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                            <th>Hình ảnh</th>
                            <th>Mã</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php listCate($data); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
