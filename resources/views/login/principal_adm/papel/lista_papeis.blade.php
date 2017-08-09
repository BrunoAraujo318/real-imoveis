@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Papéis</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Papéis</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descricao</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->nome }}</td>
					<td>{{ $registro->descricao }}</td>
					<td>
						@if($registro->nome != 'admin')
						<a class="btn blue" href="{{ route('admin.papel.editar', $registro->id) }}">Editar</a>
						@else
						<a class="btn blue disabled">Editar</a>
						@endif
						<a class="btn blue" href="{{ route('admin.papel.permissao', $registro->id) }}">Permissão</a>
						@if($registro->nome != 'admin')
						<a class="btn deep-orange darken-1" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.papel.deletar', $registro->id) }}'}">Deletar</a>
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
			<a class="btn blue" href="{{ route('admin.papel.adicionar') }}">Adicionar</a>
		</div>
	</div>
</div>
@endsection