<?php

namespace RealImoveis\Http\Requests;

use RealImoveis\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'usuario.nome' => 'required',
            'usuario.email' => 'required|email|unique:usuarios,email',
            'usuario.nascimento' => 'required',
            'usuario.cpf' => 'required',
            'endereco.estado_id' => 'required',
            'endereco.cidade_id' => 'required',
            'endereco.logradouro' => 'required',
            'endereco.bairro' => 'required',
            'endereco.numero' => 'required',
            'endereco.cep' => 'required',
        ];
    }
}
