@include('layouts._site._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3>Login</h3>
		<form action="{{ route('login') }}" method="post">
			{{ csrf_field() }}
			@include('login._form')
			<button id="button" type="submit" class="btn">Entrar</button>
		</form>
</div>

@endsection