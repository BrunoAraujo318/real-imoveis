@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar na Galeria</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('usuario.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('principal.imoveis') }}" class="breadcrumb black-text text-lighten-3">Imóveis</a>
		        <a href="{{ route('principal.galeria', $imovel->id) }}" class="breadcrumb black-text text-lighten-3">Galeria de Imagens</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar na Galeria</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('principal.galeria.salvar', $imovel->id) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('login.principal_usuario.galeria._form')
			<button class="btn blue">Salvar Imagem</button>
		</form>
	</div>
</div>

@endsection