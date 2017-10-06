@include('login.principal_uadm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.perfil.salvar') }}" method="post">
			{{ csrf_field() }}
			@include('login.principal_adm.perfil._form')
			<button id="button" class="btn">Salvar</button>
		</form>
	</div>
</div>

@endsection