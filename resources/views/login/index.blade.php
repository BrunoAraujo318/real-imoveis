@include('layouts._login._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3>Entrar</h3>
		<form action="{{ route('login') }}" method="post">
			{{ csrf_field() }}
			@include('login._form')
			<button type="submit" class="btn blue">Entrar</button>
		</form>
		<a class="btn deep-orange darken-1" href="{{ route('principal.cadastro') }}">Cadastrar-se</a>
</div>

@endsection