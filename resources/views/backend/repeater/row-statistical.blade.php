<?php $key = isset($key) ? $key : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index">{{ $index }}</td>
	<td>
        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" name="content[statistical][{{ $key }}][name]" class="form-control" value="{!! @$value->name !!}">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" name="content[statistical][{{ $key }}][desc]" class="form-control" value="{!! @$value->desc !!}">
        </div>
	</td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
