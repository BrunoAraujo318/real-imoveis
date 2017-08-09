@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Editar Cidades</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.cidades') }}" class="breadcrumb black-text text-lighten-3">Lista de Cidades</a>
		        <a class="breadcrumb black-text text-lighten-3">Editar Cidades</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.cidades.atualizar', $registro->id) }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">
			@include('login.principal_adm.cidades._form')
			<button class="btn blue">Atualizar</button>
		</form>
	</div>
</div>

@endsection