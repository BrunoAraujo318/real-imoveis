@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
    	<h3 align="center">Imóvel</h3>
    	<div class="divider"></div>
    </div>
    <div class="row section">
    	<div class="col s12 m6">
        @if($imovel->imagens()->count())
    		<div class="row">
                <div class="slider">
                    <ul class="slides">
                    @foreach($galeria as $imagem)
                        <li>
                            <img src="{{ asset($imagem->imagem) }}">
                            <div class="caption {{ $direcaoImagem[rand(0,2)] }}">
                                <h3>{{ $imagem->nome }}</h3>
                                <h5>{{ $imagem->descricao }}</h5>
                            </div>
                        </li>
                    @endforeach    
                    </ul>
                </div>      
            </div>
            <div class="row" align="center">
                <button onclick="sliderPrev()" class="btn blue">Anterior</button>
                <button onclick="sliderNext()" class="btn blue">Próximo</button>
            </div>
        @else
            <img class="responsive-img" src="{{ asset($imovel->imagem) }}">
        @endif
    	</div>
    	<div class="col s12 m3">
            <h4>{{ $imovel->titulo }}</h4>
            <blockquote>
                {{ $imovel->descricao }}
            </blockquote>
            <p><b>Código:</b> {{ $imovel->id }}</p>
            <p><b>Condomínio:</b> {{ $imovel->condominio }}</p>
            <p><b>Tipo:</b> {{ $imovel->tipo->titulo }}</p>
            <p><b>Endereço:</b> {{ $endereco->logradouro }}</p>
            <p><b>Cep:</b> {{ $endereco->cep }}</p>
            <p><b>Cidade:</b> {{ $endereco->cidade->nome }}</p>
            <p><b>Valor:</b> R$ {{ number_format($imovel->valor,2,",",".") }}</p>
             <p><b>Dormitórios:</b> {{ $imovel->qtd_dormitorios}}</p>
            <a class="btn deep-orange darken-1" href="#">Contato</a>
    	</div>  
    </div>
    <div class="row section">
        <div class="col s12 m8">
            <div class="video-converter">
            </div>
        </div>
        <div class="col s12 m4">
            <h5>Detalhes:</h5>
            <p></p>
        </div>
    </div>
</div>
@endsection