@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar na Galeria</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.imoveis') }}" class="breadcrumb black-text text-lighten-3">Imóveis</a>
		        <a href="{{ route('admin.galeria', $imovel->id) }}" class="breadcrumb black-text text-lighten-3">Galeria de Imagens</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar na Galeria</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.galeria.salvar', $imovel->id) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('login.principal_adm.galeria._form')
			<button class="btn blue">Salvar Imagem</button>
		</form>
	</div>
</div>

@endsection