<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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
        $uuid = $this->segment(3);

        return [
            'name' => "required",
            'email' => "required|unique:users,email,{$uuid},uuid",
            'password' => "required|min:6|max:16",
            'employee_id' => "required",
        ];
    }
}
