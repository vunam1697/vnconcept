<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
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
            'password'      => 'required|min:8',
            'repassword'    => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'password.required'     => 'Bạn chưa nhập mật khẩu.',
            'password.min'          => 'Bạn cần nhập mật khẩu nhiều hơn 8 ký tự.',
            'repassword.required'   => 'Bạn chưa nhập lại mật khẩu.',
            'repassword.same'       => 'Hai mật khẩu bạn nhập không khớp nhau.',
        ];
    }
}
