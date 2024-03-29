<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $unique = $this->is('companies.store') ? '|unique:companies' : '';
        return [
            'name' => 'required|max:255'.$unique,
            'email' => 'email|max:255',
            'logo' => 'image||dimensions:min_width=100,min_height=100'
        ];
    }
}
