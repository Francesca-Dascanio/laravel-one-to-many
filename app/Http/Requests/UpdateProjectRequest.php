<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Modifico con true per permettere a tutti admin di modificare dati
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required | max: 100',
            'slug' =>  'required | max: 100',
            'year' => 'required | numeric | min: 1930 | max: 2030',
            'img' => 'nullable | image | max: 2048',
            'delete_img' => 'nullable',
            'description' => 'nullable',
            
        ];
    }
}
