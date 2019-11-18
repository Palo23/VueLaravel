<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFile extends FormRequest
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
            'file-cur' => 'mimes:doc,docx,pdf,odt',
        ];
    }
    
    public function messages() 
    {
        return [
            'file-cur.required' => 'No has seleccionado ningun archivo.',
        ];
    }
}
