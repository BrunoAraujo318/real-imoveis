@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Tipos de Imóveis</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Tipos de Imóveis</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<div class="right">
			<a id="button" class="btn" href="{{ route('admin.imovel.tipos.adicionar') }}">Adicionar Tipos</a>
		</div>
	</div>
	<div class="divider"></div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Título</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tipos as $tipo)
				<tr>
					<td>{{ $tipo->nome }}</td>
					<td>
						<a class="btn blue" title="Editar Tipo de Imóvel" href="{{ route('admin.imovel.tipos.editar', $tipo->id) }}"><i class="small material-icons">mode_edit</i></a>
						<a class="btn deep-orange darken-1" title="Deletar Tipo de Imóvel" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.imovel.tipos.deletar', $tipo->id) }}'}"><i class="small material-icons">delete_forever</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="divider"></div>
</div>
@endsection