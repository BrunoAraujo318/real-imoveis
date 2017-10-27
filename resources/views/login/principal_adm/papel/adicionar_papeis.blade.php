@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar Papéis</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.papel') }}" class="breadcrumb black-text text-lighten-3">Papéis</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.papel.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_adm.papel._form')
			<div class="center">
				<button id="button" class="btn">Salvar</button>
			</div>
		</form>
	</div>
</div>

@endsection