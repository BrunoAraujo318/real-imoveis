@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Perfil Administrador</h3>
	<div class="row">
	<div class="divider"></div>
	<div class="row">
		<main>
	      	<div class="container">
        		<div class="col s12 m4">
        			<div class="card">
			        	<div class="card-image">     	
	              			<a href="{{ route('admin.usuarios') }}"><img src="{{ asset('img/icone-usuario.jpg') }}"></a>
				            	<div class="card-action">
				              		<a href="{{ route('admin.usuarios') }}">Usuários</a>
				            	</div>
			        	</div>
		        	</div>
        		</div>
	        	<div class="col s12 m4">
	        		<div class="card">
			        	<div class="card-image">
		              		<a href="{{ route('admin.paginas') }}"><img src="{{ asset('img/icone-pagina.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.paginas') }}">Páginas</a>
					            </div>
			        	</div>
	        		</div>
	        	</div>
	        	<div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		 <a href="{{ route('admin.imoveis') }}"><img src="{{ asset('img/icone-imoveis.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.imoveis') }}">Imóveis</a>
					            </div>					   
				        </div>
		        	</div>
		        </div>
		        <div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		<a href="{{ route('admin.imovel.tipos') }}"><img src="{{ asset('img/icone-tipos.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.imovel.tipos') }}">Tipos de Imóveis</a>
					            </div>			    
				        </div>
		        	</div>
		        </div>
		        <div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		<a href="{{ route('admin.cidades') }}"><img src="{{ asset('img/icone-cidades.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.cidades') }}">Cidades</a>
					            </div>					   
				        </div>
		        	</div>
		        </div>
		        <div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		<a href="{{ route('admin.slides') }}"><img src="{{ asset('img/icone-slide.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.slides') }}">Slides</a>
					            </div>
				        </div>
		        	</div>
		        </div>
		        <div class="col s12 m4">
		        	<div class="card">
				        <div class="card-image">
		              		<a href="#"><img src="{{ asset('img/icone-contrato.jpg') }}"></a>
					            <div class="card-action">
					              <a href="#">Gerar Contato</a>
					            </div>
				        </div>
		        	</div>
		        </div>
	    	</div>
	    </main>
			<!-- <li><a href="{{ route('admin.papel') }}">Papéis</a></li> -->
	</div>
</div>

@endsection