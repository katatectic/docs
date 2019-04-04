<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:2|max:200',
        ];

        if (!empty($this['files']))
            if(count($this['files'])) foreach (range(0, count($this['files']) - 1) as $index) $rules['files.'.$index] = 'mimes:pdf';

        return $rules;

    }
}
