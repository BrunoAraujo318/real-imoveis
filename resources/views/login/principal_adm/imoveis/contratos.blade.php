@include('login.principal_adm._nav')

@extends('layouts.app')

@section('content')

<div class="container" id="dialog-mensagem" style="display:none;">
	<div class="row">
		<div class="card green">
			<div align="center" class="card-content" id="content-mensagem" style="color:white"></div>
		</div>
	</div>
</div>

<div class="container">

	<h3 class="center">Contrato</h3>
	<div class="row">
		<nav>
		    <div class="nav-wrapper #e0e0e0 grey lighten-2">
		      <div class="col s12 m12">
		      	<a href="{{ route('admin.principal') }}" class="breadcrumb black-text text-lighten-3">Início</a>
		        <a href="{{ route('admin.imoveis') }}" class="breadcrumb black-text text-lighten-3">Imóveis</a>
		        <a class="breadcrumb black-text text-lighten-3">Contrato</a>
		      </div>
		    </div>
	  	</nav>
	</div>

	<div class="row">
		<div class="center">
			<div class="col s12 m12">
				@if($imovel->imagens()->count())
					<div class="row">
						<div class="slider">
							<ul class="slides">
							<li><img src="{{ asset($imovel->imagem) }}"></li>
							@foreach($galeria as $imagem)
								<li>
									<img src="{{ asset($imagem->imagem) }}">
									<div class="caption {{ $direcaoImagem[rand(0,2)] }}">
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
				@else
					<img class="responsive-img" src="{{ asset($imovel->imagem) }}">
				@endif
	    	</div>
    	</div>

		<div class="col s6 m6">
            <h5>Título: {{ $imovel->nome }}</h5>
		</div>

        <div class="col s6 m6" align="right">
            <p><b><i class="fa fa-usd" aria-hidden="true"></i> Valor:</b><b class="orange-text text-darken-3"> R$ {{ number_format($imovel->valor,2,",",".") }}</b></p>
        </div>

        <div class="col s12 m12">
            <blockquote>
                Descrição: {{ $imovel->descricao }}
            </blockquote>
        </div>

        <div class="col s6 m6">
            <p>
                <b><i class="tiny material-icons">hotel</i> Dormitório:</b> {{ $imovel->qtd_dormitorio }}
                <b><i class="fa fa-bath"></i> Banheiro:</b> {{ $imovel->qtd_banheiro }}
                <b><i class="tiny material-icons">restaurant_menu</i> Cozinha:</b> {{ $imovel->qtd_cozinha }}
                <b><i class="tiny material-icons">drive_eta</i> Garagem:</b> {{ $imovel->qtd_garagem }}
            </p>
        </div>

		<form action="{{ route('admin.imovel.contrato.salvar') }}" id="contratoForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<input type="hidden" name="imovel_id" value="{{ $imovel->id }}">
			<div class="col m6 s6">
				<div class="right">
					<div class="file-field input-field">
						<div id="button_upload" class="btn">
							<span>Upload de Contrato</span>
							<input type="file" name="arquivo" id="arquivo" onchange="realImovel.contrato.salvar(contratoForm);" />
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	<div class="divider"></div>

	<div class="row">
		<div class="col s12 m12">
			<table>
				<thead>
					<tr>
						<th>Título</th>
						<th>Descrição</th>
						<th>Contratos</th>
					</tr>
				</thead>
				<tbody>
				@foreach($contratos as $contrato)
					<tr>
						<td>{{ $contrato->titulo }}</td>
						<td>{{ $contrato->descricao }}</td>
						<td>
							<a href="{{ asset($contrato->url) }}">Download</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="divider"></div>
</div>

@section('js')
<script src="{{asset('js/contrato.js')}}"></script>

<script>
$(function(){
	realImovel.contrato.iniciar();
});
</script>
@endsection

@endsection