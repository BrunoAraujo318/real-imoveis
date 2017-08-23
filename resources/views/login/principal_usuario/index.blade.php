@include('login.principal_usuario._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Perfil Usuário</h3>
	<div class="row">
	<div class="divider"></div>
	<div class="row">
		<main>
	      	<div class="container">
	      		<div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		 <a href="{{ route('principal.imoveis') }}"><img src="{{ asset('img/icone-imoveis.png') }}"></a>
					            <div class="card-action" align="center">
					              <a href="{{ route('principal.imoveis') }}">Imóveis</a>
					            </div>					   
				        </div>
		        	</div>
		        </div>
		        <div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		 <a href="#"><img src="{{ asset('img/icone-contrato.jpg') }}"></a>
					            <div class="card-action" align="center">
					              <a href="#">Gerar Contratos</a>
					            </div>					   
				        </div>
		        	</div>
		        </div>
	      	</div>
	    </main>
	</div>
</div>

@endsection