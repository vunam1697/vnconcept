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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="btnAdd">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
                                    <i class="fa fa-trash-o"></i> Xóa
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Lọc</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route($module['module'].'.index') }}">Tất cả</a></li>
                                        <li><a href="{{ route($module['module'].'.index', ['status' => 1]) }}">Bình luận đã được duyệt</a></li>
                                        <li><a href="{{ route($module['module'].'.index', ['status' => 2]) }}">Bình luận chưa được duyệt</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box-tools" style="position: absolute;right: 22px;">
                                <div class="input-group input-group-sm hidden-xs" style="width: 300px;">
                                    <input type="text" id="search_input" class="form-control pull-right" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="button" id="search_btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p><b>Tổng số: {{ $comments->total() }}</b></p>

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px"><input type="checkbox" name="chkAll" id="chkAll"></th>
                                <th width="10px">STT</th>
                                @foreach ($module['table'] as $key => $item)
                                   <th width="{{ @$item['with'] }}">{{ $item['title'] }}</th>
                                @endforeach
                                <th width="100px">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $offset = ($comments->currentPage() - 1) * $comments->perPage();
                            @endphp
                            @foreach ($comments as $item)
                                <tr>
                                    <td><input type="checkbox" name="chkItem[]" value="{{ $item->id }}"></td>
                                    <td>{{ ++$offset }}</td>
                                    <td>
                                        <a href="{{ route('home.single-product', $item->Product->slug) }}" target="_black">
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>{{ $item->Product->name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td width="30%">{{ html_entity_decode(text_limit(strip_tags($item->content), 10).'...') }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a href="javascript:;" class="activeq" data-id="{{ $item->id }}"><span class="label label-success">Đã duyệt</span></a>
                                        @else
                                            <a href="javascript:;" class="activeq" data-id="{{ $item->id }}"><span class="label label-danger">Chưa duyệt</span></a>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('evaluate.show', $item->id_product) }}" class="btn btn-success btn-sm">Chi tiết</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: right;">
                        {!! $comments->appends(request()->all())->links('backend.layouts.panigation') !!}
                    </div>
                    <p style="font-weight: bolder; font-style: italic; color: red">TIP: Nhấn vào Duyệt - Chưa Duyệt để chuyển nhanh trạng thái bình luận.</p>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <?php $url = route($module['module'].'.index') ?>
    @include('backend.layouts.components.table-js-config', ['route'=> $url ])
    <script>
        jQuery(document).ready(function($) {
            $('body').on('click', '.activeq', function(event) {
                id = $(this).data('id');
                var btn = $(this);
                $.get('{{ route('evaluate.active') }}?id='+id, function(data) {
                    btn.html(data);
                });
            });
        });


        $('#search_btn').click(function(event) {
            window.location.href = '{{ route($module['module'].'.index') }}?q='+$('#search_input').val();
        });
    </script>
@stop
