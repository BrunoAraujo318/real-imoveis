<?php

namespace RealImoveis\Http\Requests;

use RealImoveis\Http\Requests\Request;

class ImovelRequest extends Request
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
            'imovel.nome' => 'required,max:100'
        ];
    }
}
