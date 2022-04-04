@extends('errors::minimal')
@section('title', __('404 - Không tìm thấy'))
@section('main')
<div class="page-404">
        <div class="page-404__wap">
            <h1 class="title__404">
                404
            </h1>
            <h3 class="note__404">
                Không tìm thấy trang !
            </h3>
            <p>
                Trang đã bị xóa hoặc địa chỉ URL không đúng
            </p>
            <a href="{{ url('/') }}" class="btn btn__404">
                QUAY VỀ TRANG CHỦ
            </a>
        </div>
    </div>
@stop
