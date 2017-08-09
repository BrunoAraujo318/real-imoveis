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
	<div class="divider"></div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->id }}</td>
					<td>{{ $usuario->name }}</td>
					<td>{{ $usuario->email }}</td>
					<td>
						<a class="btn blue" href="{{ route('admin.usuarios.editar', $usuario->id) }}">Editar</a>
						<!-- <a class="btn green" href="{{ route('admin.usuarios.papel', $usuario->id) }}">Papéis</a> -->
						@if($usuario->email != 'admin@mail.com')
						<a class="btn deep-orange darken-1" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.usuarios.deletar', $usuario->id) }}'}">Deletar</a>
						@else
						<a class="btn blue disabled">Deletar</a>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="divider"></div>
	<div class="row">
		<div class="right">
			<a class="btn blue" href="{{ route('admin.usuarios.adicionar') }}">Adicionar Usuários</a>
		</div>
	</div>
</div>
@endsection