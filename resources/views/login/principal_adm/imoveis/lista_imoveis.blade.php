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
	<div class="divider"></div>
	<div class="row">
			<table>
				<thead>
					<tr>
						<th>Título</th>					
						<th>Condominio</th>
						<th>Cidade</th>				
						<th>Valor</th>
						<th>Imagem</th>
						<th>Publicado</th>			
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->titulo }}</td>
						<td>{{ $registro->condominio }}</td>
						<td>{{ $registro->cidade->nome }}</td>
						<td>R$ {{ number_format($registro->valor,2,",",".") }}</td>
						<td><img width="100" src="{{asset($registro->imagem)}}"></td>
						<td>{{ $registro->publicar }}</td>
						<td>
							<a class="btn green" href="{{ route('admin.galeria', $registro->id) }}">Galeria</a>
							<a class="btn blue" href="{{ route('admin.imoveis.editar', $registro->id) }}">Editar</a>
							<a class="btn deep-orange darken-1" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('admin.imoveis.deletar', $registro->id) }}'}">Deletar</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
	<div class="divider"></div>
	<div class="row">
		<div class="right">
			<a class="btn blue" href="{{ route('admin.imoveis.adicionar') }}">Adicionar Imóveis</a>
		</div>
	</div>
</div>
@endsection