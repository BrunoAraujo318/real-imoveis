<?php

namespace RealImoveis\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Initialize an new transaction.
     */
    protected function beginTransaction()
    {
        DB::beginTransaction();
    }

    /**
     * Finish transaction with success.
     */
    protected function commit()
    {
        DB::commit();
    }

    /**
     * Undo transaction.
     */
    protected function rollBack()
    {
        DB::rollBack();
    }

    /**
     * Converte o valor da moeda para o valor do banco de dados
     *
     * @param $moeda
     */
    protected function moedaBanco($moeda = 0)
    {
        return str_replace(',','.', str_replace('.', '', $moeda));
    }

    /**
     * Remove acento da $string informada.
     *
     * @param $string
     * @param $slug
     * @return mixed
     */
    public function removeAcentos($string, $slug = false)
    {

        $string = utf8_decode(strtolower($string));

        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), [240, 248]);
        $ascii['u'] = range(249, 252);

        // Código ASCII dos outros caracteres
        $ascii['c'] = [231];
        $ascii['d'] = [208];
        $ascii['n'] = [241];
        $ascii['y'] = [253, 255];

        foreach ($ascii as $key => $item) {
            $acentos = '';

            foreach ($item as $codigo) {
                $acentos .= chr($codigo);
            }

            $troca[$key] = '/[' . $acentos . ']/i';

        }

        $string = preg_replace(array_values($troca), array_keys($troca), $string);

        // Slug?
        if ($slug) {

            // Troca tudo que não for letra ou número por um caractere ($slug)
            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);

            // Tira os caracteres ($slug) repetidos
            $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
            $string = trim($string, $slug);

        }

        return $string;
    }
}
