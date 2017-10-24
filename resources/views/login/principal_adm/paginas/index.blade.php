@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Páginas</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Páginas</a>
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
					<th>Descrição</th>
					<th>Tipo</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($paginas as $pagina)
				<tr>
					<td>{{ $pagina->titulo }}</td>
					<td>{{ $pagina->descricao }}</td>
					<td>{{ $pagina->tipo }}</td>
					<td>
						<a class="btn blue" title="Editar Página" href="{{ route('admin.paginas.editar', $pagina->id) }}"><i class="small material-icons">mode_edit</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="divider"></div>
</div>
@endsection