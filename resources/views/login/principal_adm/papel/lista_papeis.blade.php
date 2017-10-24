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
			@foreach($papeis as $papel)
				<tr>
					<td>{{ $papel->name }}</td>
					<td>{{ $papel->description }}</td>
					<td>
						@if($papel->name != 'admin')
						<a class="btn blue" title="Editar Papel" href="{{ route('admin.papel.editar', $papel->id) }}"><i class="small material-icons">mode_edit</i></a>
						@else
						<a class="btn blue disabled" title="Editar Papel"><i class="small material-icons">mode_edit</i></a>
						@endif
						<a class="btn blue" title="Permissão" href="{{ route('admin.papel.permissao', $papel->id) }}">Permissão</a>
						@if($papel->name != 'admin')
						<a class="btn deep-orange darken-1" title="Deletar Papel" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.papel.deletar', $papel->id) }}'}">Deletar</a>
						@else
						<a class="btn blue disabled" title="Deletar Papel"><i class="small material-icons">delete_forever</i></a>
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
			<a id="button" class="btn blue" href="{{ route('admin.papel.adicionar') }}">Adicionar</a>
		</div>
	</div>
</div>
@endsection