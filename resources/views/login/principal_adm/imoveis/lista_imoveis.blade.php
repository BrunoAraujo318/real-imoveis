@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Imóveis</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Imóveis</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<div class="right">
			<a id="button" class="btn" href="{{ route('admin.imoveis.adicionar') }}">Adicionar Imóveis</a>
		</div>
	</div>
	<div class="divider"></div>
	<div class="row">
		<table class="bordered striped highlight responsive-table">
			<thead>
				<tr>
					@if(Auth::user()->hasRole('admin'))
						<th>Proprietário</th>
					@endif
					<th>Título</th>
					<th>Tipo Imovel</th>
					<th>Categoria e Serviços</th>
					<th>Valor</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($imoveis as $imovel)
				<tr>
					@if(Auth::user()->hasRole('admin'))
						<td>{{ $imovel->usuario->nome }}</td>
					@endif
					<td>{{ $imovel->nome }}</td>
					<td>{{ $imovel->tipo->nome }}</td>
					<td>{{ $imovel->getNomeCategoria() }}</td>
					<td>R$ {{ number_format($imovel->valor,2,",",".") }}</td>
					<td>
						<a class="btn blue" title="Editar Imóvel" href="{{ route('admin.imoveis.editar', $imovel->id) }}"><i class="small material-icons">mode_edit</i></a>
						<a class="btn green" title="Gerar Contrato" href="{{ route('admin.contratos', $imovel->id) }}"><i class="material-icons">add</i></a>
						<a class="btn deep-orange darken-1" title="Deletar Imóvel" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.imoveis.deletar', $imovel->id) }}'}"><i class="small material-icons">delete_forever</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection