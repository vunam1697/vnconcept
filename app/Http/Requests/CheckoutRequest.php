<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CheckoutRequest extends FormRequest
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
            'name'      => 'required',
            'phone'     => 'required|min:10',
            'email'     => 'required|email:rfc,dns,filter',
            
        ];
    }
    public function messages()
    {
        $message = [
            'name.required' => 'Bạn chưa nhập họ tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.rfc' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.dns' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.filter' => 'Email phải là một địa chỉ email hợp lệ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'phone.min' => 'Số điện thoại sai.',
        ];

        return $message;
    }

    protected function failedValidation(Validator $validator) {

        throw new HttpResponseException(response()->json(
             [
                 'success' => false,
                 'errorMessage'=>$validator->messages()
             ]
             )
         );
    }
}
