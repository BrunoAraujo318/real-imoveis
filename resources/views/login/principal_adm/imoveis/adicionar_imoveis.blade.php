@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Adicionar Imóveis</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.imoveis') }}" class="breadcrumb black-text text-lighten-3">Imóveis</a>
		        <a class="breadcrumb black-text text-lighten-3">Adicionar Imóveis</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.imoveis.salvar') }}" method="post" enctype="multipart/form-data">
			@php $estadoId = old('endereco.estado_id') @endphp
			@php $cidadeId = old('endereco.cidade_id') @endphp
			{{ csrf_field() }}
			@include('login.principal_adm.imoveis._form')
			<button type="submit" class="btn blue" title="Salvar">Salvar</button>
		</form>
	</div>
</div>

@section('js')
<script>
		$(function(){
			realImovel.getCidades('#estado_id', function() {
				var cidadeId = $('#cidade_hide_id').val();
				$('#cidade_id').val(cidadeId);
				$('select').material_select();
			});
		});
</script>
@endsection

@endsection