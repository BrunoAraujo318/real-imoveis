@include('layouts._site._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Cadastro</h3>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('principal.cadastro.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('cadastro._form')
			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection