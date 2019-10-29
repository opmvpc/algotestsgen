<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'probleme_id' => 'required|int',
            'nom' => 'required|string|max:100',
            'resultat' => [
                'required',
                'max:100',
                'regex:/^(null|\{(\s*\d\s*\,?\s*)*\})$/i',
            ],
            'body' => 'required|string|max:500',
        ];
    }
}
