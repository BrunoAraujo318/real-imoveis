@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Perfil Administrador</h3>
	<div class="row">
	<div class="divider"></div>
	<div class="row">
		<h5>Funções:</h5>
		<ul>
			<li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
			<li><a href="{{ route('admin.paginas') }}">Páginas</a></li>
			<li><a href="{{ route('admin.imovel.tipos') }}">Tipos de Imóveis</a></li>
			<li><a href="{{ route('admin.cidades') }}">Cidades</a></li>
			<li><a href="{{ route('admin.imoveis') }}">Imóveis</a></li>
			<li><a href="{{ route('admin.slides') }}">Slides</a></li>
			
			<!-- <li><a href="{{ route('admin.papel') }}">Papéis</a></li> -->
		</ul>
	</div>
</div>

@endsection