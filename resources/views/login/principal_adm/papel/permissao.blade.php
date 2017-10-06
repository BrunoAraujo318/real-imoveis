@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Permissões para {{$papel->nome}}</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.papel') }}" class="breadcrumb black-text text-lighten-3">Papéis</a>
		        <a class="breadcrumb black-text text-lighten-3">Permissões</a>
		      </div>
		    </div>
	  	</nav>   
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.papel.permissao.salvar', $papel->id) }}" method="post">
			{{ csrf_field() }}
			<div class="input-field">
				<select name="bloqueio_id">
					@foreach($permissao as $valor)
					<option value="{{$valor->id}}">{{$valor->nome}}</option>
					@endforeach
				</select>
			</div>
			<button class="btn blue">Adicionar</button>
		</form>
	</div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Permissão</th>
					<th>Descricao</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($papel->permissoes as $value)
				<tr>
					<td>{{ $value->nome }}</td>
					<td>{{ $value->descricao }}</td>
					<td>		
						<a id="button"class="btn" href="javascript: if(confirm('Remover esse Permissão?')){ window.location.href = '{{ route('admin.papel.permissao.remover', [$papel->id,$value->id]) }}'}">Remover</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection