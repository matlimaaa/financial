<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTransaction extends FormRequest
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
            'code' => "nullable|unique:transactions,code,{$uuid},uuid",
            'description' => "required",
            'full_description' => "nullable",
            'date' => "required|date",
            'price' => "required",
            'current_account' => "required|boolean",
            'by_admin' => "nullable|boolean",
            'status' => "nullable|boolean",
            'document_number' => "nullable",
            'document_batch' => "nullable",
            'document_protocol' => "nullable",
            'account_id' => "required|exists:accounts,id",
        ];
    }
}
