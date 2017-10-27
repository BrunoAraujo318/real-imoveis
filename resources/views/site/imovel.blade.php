@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
    	<h3 align="center">Imóvel</h3>
    	<div class="divider"></div>
    </div>
    <div class="row section">
        <div class="center">
        	<div class="col s12 m12">
            @if($imovel->imagens()->count())
        		<div class="row">
                    <div class="slider">
                        <ul class="slides">
                        <li><img src="{{ asset($imovel->imagem) }}"></li>
                        @foreach($galeria as $imagem)
                            <li>
                                <img src="{{ asset($imagem->imagem) }}">
                                <div class="caption {{ $direcaoImagem[rand(0,2)] }}">
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <img class="responsive-img" src="{{ asset($imovel->imagem) }}">
            @endif
        	</div>
        </div>
    	<div class="col s12 m12">
            <h5>{{ $imovel->nome }}</h5>
            <blockquote>
                {{ $imovel->descricao }}
            </blockquote>
        </div>
        <div class="col s6 m6">
            <p>
                <b><i class="tiny material-icons">hotel</i> Dormitório:</b> {{ $imovel->qtd_dormitorio }}
                <b><i class="fa fa-bath"></i> Banheiro:</b> {{ $imovel->qtd_banheiro }}
                <b><i class="tiny material-icons">restaurant_menu</i> Cozinha:</b> {{ $imovel->qtd_cozinha }}
                <b><i class="tiny material-icons">drive_eta</i> Garagem:</b> {{ $imovel->qtd_garagem }}
            </p>
        </div>
        <div class="col s6 m6" align="right">
            <p><b><i class="fa fa-usd" aria-hidden="true"></i> Valor:</b><b class="orange-text text-darken-3"> R$ {{ number_format($imovel->valor,2,",",".") }}</b></p>
        </div>
        <div class="col s12 m12">
            <p><b>Código:</b> {{ $imovel->id }}</p>
            <p><b>Categoria ou Serviço:</b> {{ $imovel->getNomeCategoria() }}</p>
            <p><b>Tipo:</b> {{ $imovel->tipo->nome }}</p>
            <p><b>Endereço:</b> {{ $endereco->logradouro }}, nº {{ $endereco->numero }}. {{ $endereco->complemento }}</p>
            <p><b>Cep:</b> {{ $endereco->cep }}</p>
            <p><b>Cidade:</b> {{ $endereco->cidade->nome }}</p>
            <p><b>Estado:</b> {{ $endereco->cidade->estado->nome }}</p>
    	</div>
        <div class="col s12 m12" align="center">
            <a id="button" class="btn" href="#"> Download Contrato</a>
        </div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            <div class="video-converter">
            </div>
        </div>
    </div>
</div>
@endsection