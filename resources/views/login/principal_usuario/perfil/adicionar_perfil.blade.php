@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('principal.perfil.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_usuario.perfil._form')
			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection