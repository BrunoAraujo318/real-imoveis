@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
    	<h3 align="center">Imóvel</h3>
    	<div class="divider"></div>
    </div>
    <div class="row section">
    	<div class="col s12 m12">
        @if($imovel->imagens()->count())
    		<div class="row">
                <div class="slider">
                    <ul class="slides">
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
    	<div class="col s12 m12">
            <h4>{{ $imovel->nome }}</h4>
            <blockquote>
                {{ $imovel->descricao }}
            </blockquote>
            <p><b>Código:</b> {{ $imovel->id }}</p>
            <p><b>Categoria:</b> {{ $imovel->getNomeCategoria() }}</p>
            <p><b>Tipo:</b> {{ $imovel->tipo->nome }}</p>
            <p><b><i class="tiny material-icons">home</i> Endereço:</b> {{ $endereco->logradouro }}</p>
            <p><b>Cep:</b> {{ $endereco->cep }}</p>
            <p><b>Cidade:</b> {{ $endereco->cidade->nome }}</p>
            <p><b><i class="fa fa-usd" aria-hidden="true"></i> Valor:</b> R$ {{ number_format($imovel->valor,2,",",".") }}</p>
            <p><b><i class="tiny material-icons">hotel</i> Dormitório:</b> {{ $imovel->qtd_dormitorio }}</p>
            <p><b><i class="fa fa-bath"></i> Banheiro:</b> {{ $imovel->qtd_banheiro }}</p>
            <p><b><i class="tiny material-icons">restaurant_menu</i> Cozinha:</b> {{ $imovel->qtd_cozinha }}</p>
            <p><b><i class="tiny material-icons">drive_eta</i> Garagem:</b> {{ $imovel->qtd_garagem }}</p>
            <a class="btn deep-orange darken-1" href="#">Contrato</a>
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