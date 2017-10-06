@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
    	<h3 align="center">Sobre</h3>
    	<div class="divider"></div>
    </div>
    <div class="row section">
    	<div class="col s12 m6">
    		<img class="responsive-img" src="{{ asset($pagina->imagem) }}">
    	</div>
    	<div class="col s12 m6">
    		<h4>{{ $pagina->titulo }}</h4>
    		<blockquote>
    			{{ $pagina->descricao }}
    		</blockquote>
            <div align="left">
        		<p> {{ $pagina->texto }} </p>
            </div>
    	</div>
    </div>
</div>
@endsection