@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar Usuários</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.usuarios') }}" class="breadcrumb black-text text-lighten-3">Lista de Usuários</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar Usuários</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.usuarios.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_adm.usuarios._form')
			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection