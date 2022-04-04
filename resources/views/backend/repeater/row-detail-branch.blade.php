<?php $id  = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td>
		<div class="form-group">
			<input type="text" name="value[list][{{ $id }}][address]" class="form-control" value="{{ @$item->title }}">
        </div>
	</td>
    <td>
        <div class="form-group">
			<input type="text" name="cvalue[list][{{ $id }}][phone]" class="form-control" value="{{ @$item->phone }}">
        </div>
    </td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
