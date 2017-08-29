<?php

namespace RealImoveis\Http\Controllers\Site;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Pagina;

class PaginaController extends Controller
{
    /**
     * Renderizar a interface de sobre dos Imoveis.
     * 
     * @return view
     */
    public function sobreImovel()
    {
    	$pagina = null; //Pagina::where('tipo','=','imovel')->first();

    	return view('site.imovel', compact('pagina'));
    }

    /**
     * Renderiza a interface de Contato.
     * 
     * @return view
     */
    public function contato()
    {
    	$pagina = null;//Pagina::where('tipo','=','contato')->first();

    	return view('site.contato', compact('pagina'));
    }
    
    /**
     * Renderiza a interface de Sobre.
     * 
     * @return view
     */
    public function sobre()
    {
    	$pagina = null; // Pagina::where('tipo','=','sobre')->first();

    	return view('site.sobre', compact('pagina'));
    }

    /**
     * Envia o e-mail para contato.
     * 
     * @param  Request $request
     * @return view
     */
    public function enviarContato(Request $request)
    {
    	$pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email = $pagina->email;

        \Mail::send('emails.contato', ['request'=>$request], function($m) use ($request, $email){
            $m->from($request['email'], $request['nome']);
            $m->replyTo($request['email'], $request['nome']);
            $m->subject('Real Imóveis');
            $m->to($email , 'Real Imóveis');
        });

        \Session::flash('mensagem', ['msg'=>'Contato enviado com Sucesso!', 'class'=>'green white-text']);

        return redirect()->route('site.contato');
    }
}
