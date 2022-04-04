<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'id_city' => 'required',
            'id_district' => 'required',
            'id_ward' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'     => 'Bạn chưa nhập họ và tên.',
            'phone.required'     => 'Bạn chưa nhập số điện thoại.',
            'email.unique'          => 'Email đã tồn tại.',
            'email.email'           => 'Email không đúng định dạng.',
            'email.required'        => 'Bạn chưa nhập email.',
            'id_city.required'     => 'Bạn chưa chọn tỉnh thành.',
            'id_district.required'     => 'Bạn chưa chọn quận huyện.',
            'id_ward.required'     => 'Bạn chưa chọn xã phường.',
            'address.required'     => 'Bạn chưa nhập địa chỉ.',

        ];
    }
}
