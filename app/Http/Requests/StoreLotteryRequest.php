<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLotteryRequest extends FormRequest
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
//        dd($this->request->all());
        return [
            'quantityGames' => 'required|integer|between:3,7',
            'quantityDozens' => 'required|integer|between:5,11',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'quantityGames.required' => 'O campo quantidade de jogos é obrigatorio',
            'quantityGames.between' => 'O campo quantidade de jogos deve ter no minimo 4 e no maximo 6',
            'quantityDozens.required' => 'O campo quantidade de dezenas é obrigatorio',
            'quantityDozens.between' => 'O campo quantidade de dezenas deve ter no minimo 6 e no maximo 10',
        ];
    }
}
