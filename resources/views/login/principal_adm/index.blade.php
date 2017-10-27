@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="center">Perfil {{$nomePerfil}}</h3>
	<div class="row">
	<div class="divider"></div>
	<div class="row">
		<main>
	      	<div id="fonte" class="container">
	      		<div class="col s6 m3">
		        	<div class="card">
				        <div class="card-image">
		              		 <a href="{{ route('admin.imoveis') }}"><img src="{{ asset('img/icone-imoveis.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.imoveis') }}">Meus Imóveis</a>
					            </div>
				        </div>
		        	</div>
		        </div>
		        @if (Auth::user()->hasRole('admin'))
        		<div class="col s6 m3">
        			<div class="card">
			        	<div class="card-image">
	              			<a href="{{ route('admin.usuarios') }}"><img src="{{ asset('img/icone-usuario.jpg') }}"></a>
				            	<div class="card-action">
				              		<a href="{{ route('admin.usuarios') }}">Usuários</a>
				            	</div>
			        	</div>
		        	</div>
        		</div>
        		@endif
        		@if (Auth::user()->hasRole('admin'))
	        	<div class="col s6 m3">
	        		<div class="card">
			        	<div class="card-image">
		              		<a href="{{ route('admin.paginas') }}"><img src="{{ asset('img/icone-pagina.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.paginas') }}">Páginas</a>
					            </div>
			        	</div>
	        		</div>
	        	</div>
	        	@endif
	        	@if (Auth::user()->hasRole('admin'))
		        <div class="col s6 m3">
		        	<div class="card">
				        <div class="card-image">
		              		<a href="{{ route('admin.slides') }}"><img src="{{ asset('img/icone-slide.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.slides') }}">Slides</a>
					            </div>
				        </div>
		        	</div>
		        </div>
		        @endif
		        @if (Auth::user()->hasRole('admin'))
		        <div class="col s6 m3">
        			<div class="card">
			        	<div class="card-image">
	              			<a href="{{ route('admin.papel') }}"><img src="{{ asset('img/icone-perfil.png') }}"></a>
				            	<div class="card-action">
				              		<a href="{{ route('admin.papel') }}">Gerenciar Papéis</a>
				            	</div>
			        	</div>
		        	</div>
        		</div>
        		@endif
        		@if (Auth::user()->hasRole('admin'))
        		<div class="col s6 m3">
		        	<div class="card">
				        <div class="card-image">
		              		<a href="{{ route('admin.imovel.tipos') }}"><img src="{{ asset('img/icone-tipos.png') }}"></a>
					            <div class="card-action">
					              <a href="{{ route('admin.imovel.tipos') }}">Tipos de Imóveis</a>
					            </div>
				        </div>
		        	</div>
		        </div>
		        @endif
	    	</div>
	    </main>
	</div>
</div>

@endsection