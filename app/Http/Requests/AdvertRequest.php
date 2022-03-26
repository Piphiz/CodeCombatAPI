<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertRequest extends FormRequest
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
            'name' => 'required|string',
            'file'  => 'required_without:script_html|image',
            'script_html' => 'required_without:file',
            'status' => 'required|boolean',
            'start_date' => "date",
            'end_date' => "date",

        ];
    }
}
