@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Editar Páginas</h3>
	<div class="divider"></div>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.paginas') }}" class="breadcrumb black-text text-lighten-3">Páginas</a>
		        <a class="breadcrumb black-text text-lighten-3">Editar Páginas</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<h4>Pagina: {{ $pagina->tipo }}</h4>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.paginas.atualizar', $pagina->id) }}" method="post" enctype="multpart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">
			@include('login.principal_adm.paginas._form')
			<div class="center">
				<button id="button" class="btn">Atualizar</button>
			</div>
		</form>
	</div>
</div>

@endsection