@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Tipos de Papéis para {{$usuario->name}}</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.usuarios') }}" class="breadcrumb black-text text-lighten-3">Usuários</a>
		        <a class="breadcrumb black-text text-lighten-3">Tipos de Papéis</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.usuarios.papel.salvar', $usuario->id) }}" method="post">
		{{ csrf_field() }}
		<div class="input-field">
			<select name="perfil_id">
				@foreach($papel as $valor)
					<option value="{{$valor->id}}">{{$valor->nome}}</option>
				@endforeach
			</select>
		</div>
		<div class="right">
			<button id="button" class="btn">Adicionar</button>
		</div>
		</form>
	</div>
	<div class="divider"></div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Papel</th>
					<th>Descricao</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($usuario->papeis as $papel)
				<tr>
					<td>{{ $papel->nome }}</td>
					<td>{{ $papel->descricao }}</td>
					<td>
						<a class="btn deep-orange darken-1" title="Remover" href="javascript: if(confirm('Remover esse Papel?')){ window.location.href = '{{ route('admin.usuarios.papel.remover', [$usuario->id, $papel->id]) }}'}"><i class="small material-icons">delete_forever</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="divider"></div>
</div>
@endsection