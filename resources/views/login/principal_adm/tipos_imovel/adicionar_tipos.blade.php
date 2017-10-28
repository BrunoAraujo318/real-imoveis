@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar Tipos</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.imovel.tipos') }}" class="breadcrumb black-text text-lighten-3">Tipos de Imóveis</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar Tipos</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.imovel.tipos.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_adm.tipos_imovel._form')
			<div class="center">
				<button id="button" class="btn">Salvar</button>
			</div>
		</form>
	</div>
</div>

@endsection