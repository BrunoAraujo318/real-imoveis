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
            'imovel.nome' => 'required',
            'imovel.valor' => 'required',
            'endereco.estado_id' => 'required',
            'endereco.cidade_id' => 'required',
            'endereco.logradouro' => 'required',
            'endereco.bairro' => 'required',
            'endereco.numero' => 'required',
            'endereco.cep' => 'required',
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
            'imovel.nome.required' => 'O campo título é obrigatório.',
            'imovel.valor.required' => 'O campo valor é obrigatório.',
            'endereco.estado_id.required' => 'O campo estado é obrigatório.',
            'endereco.cidade_id.required' => 'O campo cidade é obrigatório.',
            'endereco.logradouro.required' => 'O campo logradouro é obrigatório.',
            'endereco.bairro.required' => 'O campo bairro é obrigatório.',
            'endereco.numero.required' => 'O campo numero é obrigatório.',
            'endereco.cep.required' => 'O campo cep é obrigatório.',
        ];
    }
}
