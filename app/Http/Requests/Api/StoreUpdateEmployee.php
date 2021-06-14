<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmployee extends FormRequest
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
            'name' => "required|max:255",
            'cpf' => "required|unique:employees,cpf,{$uuid},uuid",
            'post_name' => "required|max:255",
            'send_image_receipt' => "required",
        ];
    }
}
