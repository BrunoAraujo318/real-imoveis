@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Editar Tipos</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.imovel.tipos') }}" class="breadcrumb black-text text-lighten-3">Tipos de Imóveis</a>
		        <a class="breadcrumb black-text text-lighten-3">Editar Tipos</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.imovel.tipos.atualizar', $tipo->id) }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">
			@include('login.principal_adm.tipos_imovel._form')
			<div class="center">
				<button id="button" class="btn">Atualizar</button>
			</div>
		</form>
	</div>
</div>

@endsection