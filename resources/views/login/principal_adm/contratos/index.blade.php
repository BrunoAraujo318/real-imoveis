@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Contrato</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Contrato</a>
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
					<th>Contratos</th>
				</tr>
			</thead>
			<tbody>
			@foreach($contratos as $contrato)
				<tr>
					<td>{{ $contrato->titulo }}</td>
					<td>{{ $contrato->descricao }}</td>
					<td>
						<a href="{{ asset($contrato->url) }}">Download</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="divider"></div>
</div>
@endsection