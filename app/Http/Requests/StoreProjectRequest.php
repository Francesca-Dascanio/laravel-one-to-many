<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Modifico indicando true per autorizzare qualunque tipo di admin a salvare dati
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    // Validazione backend
    public function rules()
    {
        return [
            'title' => 'required | max: 100',
            'slug' =>  'required | max: 100',
            'year' => 'required | numeric | min: 1930 | max: 2030',
            'description' => 'nullable',
            'img' => 'nullable | image | max: 2048'
            // Mettere comunque anche colonne nullable affinchè vengano salvati i dati - al file max: 2048 sta per 2Megabyte (1024 Kilobyte = 1 Megabyte)
        ];
    }
}
