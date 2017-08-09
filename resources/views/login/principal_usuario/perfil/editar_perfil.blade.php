@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('principal.perfil.atualizar', Auth::user()->id) }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">
			@include('login.principal_usuario.perfil._form')
			<button class="btn blue">Atualizar</button>
		</form>
	</div>
</div>

@endsection