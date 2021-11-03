<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            //
            'password'=>'required',
            'email'=>'required|unique:users,email,'.$this->id
        ];
    }
    public function messages(){
        return[
            'password.required'=>'Mật khẩu không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email đã tồn tại'
        ];
    }
}
