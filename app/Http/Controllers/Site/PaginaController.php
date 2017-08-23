<?php

namespace RealImoveis\Http\Controllers\Site;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Pagina;

class PaginaController extends Controller
{
    public function sobreImovel()
    {
    	$pagina = Pagina::where('tipo','=','imovel')->first();

    	return view('site.imovel',compact('pagina'));
    }

     public function contato()
    {
    	$pagina = Pagina::where('tipo','=','contato')->first();

    	return view('site.contato',compact('pagina'));
    }
    
    public function sobre()
    {
    	$pagina = Pagina::where('tipo','=','sobre')->first();

    	return view('site.sobre',compact('pagina'));
    }
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
