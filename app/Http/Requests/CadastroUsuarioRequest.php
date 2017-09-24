<?php

namespace RealImoveis\Http\Requests;

use RealImoveis\Http\Requests\Request;

class CadastroUsuarioRequest extends Request
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
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'cpf' => 'required',
            'nascimento' => 'required|date_format:d/m/Y',
            'password' => 'required'
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
            'password.required' => 'O campo senha é obrigatório.'
        ];
    }
}
