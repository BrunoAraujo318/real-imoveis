<div class="row section">
     <h3 align="center">Imóveis</h3>
     <div class="divider"></div>
     <br>
     @include('layouts._site._filtros')
</div>
<div class="row section">
@forelse($imoveis as $imovel)
	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href="{{ route('site.imovel', [$imovel->id, str_slug($imovel->nome, '_')]) }}">
					<img src="{{ asset($imovel->imagem) }}" alt="{{ $imovel->nome }}" height="190" />
				</a>
			</div>
			<div class="card-content">
<<<<<<< HEAD
				@if($imovel->getNomeCategoria() == 'Venda')
					<p><b class="deep-orange-text darkon-1">VENDE-SE</b></p>
				@else
					<p><b class="deep-orange-text darkon-1">ALUGA-SE</b></p>
				@endif
				<p><b>{{ $imovel->nome }}</b></p>
				<p>{{ $imovel->descricao }}</p>
				<p><b>R$ {{ number_format($imovel->valor,2,",",".") }}</b></p>
=======
				<p><b class="deep-orange-text darkon-1">{{ $imovelModel->getNomeCategoriaFormatada($imovel->categoria_servico) }}</b></p>
				<p><b>{{ $imovel->nome }}</b></p>
				<p><b>{{ $imovel->descricao }}</b></p>
				<p><b>R$ {{ number_format($imovel->valor, 2, ", ", ".") }}</b></p>
>>>>>>> ff4195dbd937d267cf0c9cd3c5b39ad569b22438
			</div>
			<div class="card-action">
				<a href="{{ route('site.imovel', [$imovel->id, str_slug($imovel->nome, '_') ]) }}">Ver mais...</a>
			</div>
		</div>
	</div>
	@empty
		<div class="col s12 m3">
			<p>Nenhum registro encontrado</p>
		</div>
	@endforelse

</div>
@if($paginacao)
<div align="center" class="row">
	{{ $imoveis->links() }}
</div>
@endif