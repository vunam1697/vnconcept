<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'         => 'required|email',
            'password'      => 'required|min:8',
            'g-recaptcha-response'  => 'required|captcha',
        ];
    }
    public function messages()
    {
        return [
            'email.unique'          => 'Email đã tồn tại.',
            'email.email'           => 'Email không đúng định dạng.',
            'email.required'        => 'Bạn chưa nhập email.',
            'password.required'     => 'Bạn chưa nhập mật khẩu.',
            'password.min'          => 'Bạn cần nhập mật khẩu nhiều hơn 8 ký tự.',
            'g-recaptcha-response.required' => 'Bạn chưa nhập capcha',
            'g-recaptcha-response.captcha' => 'Capcha không chính xác',
        ];
    }
}