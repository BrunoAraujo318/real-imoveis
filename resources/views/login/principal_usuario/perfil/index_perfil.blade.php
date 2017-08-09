@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Perfil Usuário</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a class="breadcrumb black-text text-lighten-3">Perfil</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<h5>Funções:</h5>
		<div class="row">
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ Auth::user()->name }}</td>
					<td>{{ Auth::user()->email }}</td>
					<td>
						<a class="btn blue" href="{{ route('principal.perfil.editar', Auth::user()->id) }}">Editar Perfil</a>
						<a class="btn deep-orange darken-1" href="javascript: if(confirm('Deletar esse Regritro?')){ window.location.href = '{{ route('principal.perfil.deletar', Auth::user()->id) }}'}">Deletar Perfil</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>
</div>

@endsection