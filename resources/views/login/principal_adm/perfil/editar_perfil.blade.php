@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="divider"></div>
	<div class="row">
		<form action="{{ route('admin.usuarios.atualizar', Auth::user()->id) }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">
			@include('login.principal_adm.usuarios._form')
			<div class="center">
				<button id="button" class="btn">Atualizar</button>
			</div>
		</form>
	</div>
</div>

@endsection