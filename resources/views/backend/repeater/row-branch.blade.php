<?php $key  = isset($key) ? $key : (int) round(microtime(true) * 1000); ?>
<tr>
    <td>
        <div class="form-group">
            <?php $province = App\Models\Province::all() ?>
            <label for="">Chọn chi nhánh</label>
            <select name="content[branch][{{ $key }}][province]" class="form-control multislt" required>
                <option value="">Chọn tỉnh thành</option>
                @foreach ($province as $item)
                <option value="{{ $item->_name }}" {{ $item->_name == @$value->province ? 'selected' : '' }}>{{ $item->_name }}</option>
                @endforeach
            </select>
        </div>
    </td>
	<td>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="content[branch][{{ $key }}][address]" class="form-control" value="{{ @$value->address }}" required>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="content[branch][{{ $key }}][phone]" class="form-control" value="{{ @$value->phone }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Google map</label>
                    <textarea rows="5" name="content[branch][{{ $key }}][map]" class="form-control" required>{{ @$value->map }}</textarea>
                </div>
            </div>
        </div>


	</td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<style>
    .select2-container .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
        padding: 6px 12px;
        height: 34px;
    }
</style>
<script>
    $('.multislt').select2({
        placeholder: "Chọn tỉnh thành",
    });
</script>
