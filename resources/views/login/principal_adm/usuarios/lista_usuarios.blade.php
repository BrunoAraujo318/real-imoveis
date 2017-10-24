@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Lista de Usuários</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Lista de Usuários</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<div class="right">
			<a id="button" class="btn" href="{{ route('admin.usuarios.adicionar') }}">Adicionar</a>
		</div>
	</div>

	<div class="divider"></div>

	<div class="row">
		<table class="bordered striped highlight responsive-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Perfil</th>
					<th>E-mail</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->id }}</td>
					<td>{{ $usuario->nome }}</td>
					<td>{{ $usuario->getNomesPerfis() }}</td>
					<td>{{ $usuario->email }}</td>
					<td>
						<a class="btn blue" title="Editar usuário" href="{{ route('admin.usuarios.editar', $usuario->id) }}"><i class="small material-icons">mode_edit</i></a>
						@if(! $usuario->hasRole('admin'))
						<a class="btn deep-orange darken-1" title="Deletar usuário" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.usuarios.deletar', $usuario->id) }}'}"><i class="small material-icons">delete_forever</i></a>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection