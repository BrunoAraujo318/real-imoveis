@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Editar Usuários</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.usuarios') }}" class="breadcrumb black-text text-lighten-3">Usuários</a>
		        <a class="breadcrumb black-text text-lighten-3">Editar Usuários</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.usuarios.atualizar', $usuario->id) }}" method="post">
			@php $estadoId = old('endereco.estado_id', $endereco->cidade->estado_id) @endphp
			@php $cidadeId = old('endereco.cidade_id', $endereco->cidade->id) @endphp
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">
			@include('login.principal_adm.usuarios._form')
			<div class="center">
				<button id="button" class="btn">Atualizar</button>
			</div>
		</form>
	</div>
</div>

@endsection