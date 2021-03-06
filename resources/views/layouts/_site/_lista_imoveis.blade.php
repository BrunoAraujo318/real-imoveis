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
				<p><b class="amber-text accent-3">{{ $imovelModel->getNomeCategoriaFormatada($imovel->categoria_servico) }}</b></p>
				<p><b>{{ $imovel->nome }}</b></p>
				<p>Descrição: {{ $imovel->descricao }}</p>
				<p><b>R$ {{ number_format($imovel->valor, 2, ", ", ".") }}</b></p>
			</div>
			<div class="card-action">
				<a href="{{ route('site.imovel', [$imovel->id, str_slug($imovel->nome, '_') ]) }}" class="amber-text accent-3">Ver mais...</a>
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