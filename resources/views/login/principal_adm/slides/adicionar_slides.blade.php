@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar no Slide</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.slides') }}" class="breadcrumb black-text text-lighten-3">Slide</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar no Slide</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.slides.salvar') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('login.principal_adm.slides._form')
			<div class="center">
				<button id="button" class="btn">Salvar</button>
			</div>
		</form>
	</div>
</div>

@endsection