@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar Cidades</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.cidades') }}" class="breadcrumb black-text text-lighten-3">Lista de Cidades</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar Cidades</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.cidades.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_adm.cidades._form')
			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection