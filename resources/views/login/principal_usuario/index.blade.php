@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Perfil Usuário</h3>
	<div class="row">
	<div class="divider"></div>
	<div class="row">
		<h5>Funções:</h5>
		<ul>
			<li><a href="{{ route('principal.imoveis') }}">Imóveis</a></li>
		</ul>
	</div>
</div>

@endsection