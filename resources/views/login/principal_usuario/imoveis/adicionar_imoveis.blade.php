@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar Imóveis</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('usuario.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('principal.imoveis') }}" class="breadcrumb black-text text-lighten-3">Imóveis</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar Imóveis</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('principal.imoveis.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_usuario.imoveis._form')
			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection