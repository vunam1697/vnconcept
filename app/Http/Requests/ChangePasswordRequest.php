<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;

class ChangePasswordRequest extends FormRequest
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
            'old_password'      => 'required',
            'newpassword'      => 'required|min:8',
            'repassword'    => 'required|same:newpassword'
        ];
    }
    public function messages()
    {
        return [
            'old_password.required'     => 'Bạn chưa nhập mật khẩu hiện tại.',
            // 'old_password.old_password'     => 'Mật khẩu hiện tại không đúng.',
            'newpassword.required'     => 'Bạn chưa nhập mật khẩu mới.',
            'newpassword.min'          => 'Bạn cần nhập mật khẩu mới nhiều hơn 8 ký tự.',
            'repassword.required'   => 'Bạn chưa nhập lại mật khẩu mới.',
            'repassword.same'       => 'Hai mật khẩu bạn nhập không khớp nhau.',
        ];
    }
}
