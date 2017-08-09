@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Galeria de Imagens</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.imoveis') }}" class="breadcrumb black-text text-lighten-3">Imóveis</a>
		        <a class="breadcrumb black-text text-lighten-3">Galeria de Imagens</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
			<table>
				<thead>
					<tr>
						<th>Ordem</th>
						<th>Título</th>					
						<th>Descrição</th>
						<th>Imagem</th>				
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->ordem }}</td>
						<td>{{ $registro->titulo }}</td>
						<td>{{ $registro->descricao }}</td>
						<td><img width="100" src="{{asset($registro->imagem)}}"></td>
						<td>
							<a class="btn blue" href="{{ route('admin.galeria.editar', $registro->id) }}">Editar</a>
							<a class="btn deep-orange darken-1" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.galeria.deletar', $registro->id) }}'}">Deletar</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
	<div class="divider"></div>
	<div class="row">
		<div class="right">
			<a class="btn blue" href="{{ route('admin.galeria.adicionar', $imovel->id) }}">Adicionar Imagem na Galeria</a>
		</div>
	</div>
</div>
@endsection