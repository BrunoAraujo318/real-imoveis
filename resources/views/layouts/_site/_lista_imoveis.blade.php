<div class="row section">
     <h3 align="center">Imóveis</h3>
     <div class="divider"></div>
     <br>
     @include('layouts._site._filtros')
</div>
<div class="row section">
@foreach($imoveis as $imovel)
	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href="{{ route('site.imovel', [$imovel->id,str_slug($imovel->ttulo,'_')]) }}"><img src="{{ asset($imovel->imagem) }}" alt="{{ $imovel->titulo }}"></a>
			</div>
			<div class="card-content">
				@if($imovel->getNomeCategoria() == 'Venda')
					<p><b class="deep-orange-text darkon-1">VENDE-SE</b></p>
				@else
					<p><b class="deep-orange-text darkon-1">ALUGA-SE</b></p>
				@endif
				<p><b>{{ $imovel->titulo }}</b></p>
				<p><b>{{ $imovel->descricao }}</b></p>
				<p><b>R$ {{ number_format($imovel->valor,2,",",".") }}</b></p>
			</div>
			<div class="card-action">
				<a href="{{ route('site.imovel', [$imovel->id,str_slug($imovel->ttulo,'_')]) }}">Ver mais...</a>
			</div>
		</div>
	</div>
@endforeach
</div>
@if($paginacao)
<div align="center" class="row">
	{{ $imoveis->links() }}
</div>
@endif