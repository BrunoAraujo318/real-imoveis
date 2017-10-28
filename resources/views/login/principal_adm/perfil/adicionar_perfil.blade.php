@include('login.principal_uadm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.perfil.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_adm.usuarios._form')
			<div class="center">
				<button id="button" class="btn">Salvar</button>
			</div>
		</form>
	</div>
</div>

@endsection