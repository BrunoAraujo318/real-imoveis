<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

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
    
    public function contatoLocador()
    {
    	$pagina = Pagina::where('tipo','=','contatoLocador')->first();

    	return view('site.contato',compact('pagina'));
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
