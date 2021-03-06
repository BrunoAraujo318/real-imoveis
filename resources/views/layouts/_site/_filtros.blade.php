@php
$valor = isset($filtro['valor']) ? $filtro['valor'] : '';
$estadoId = isset($filtro['estado']) ? $filtro['estado'] : '';
$cidadeId = isset($filtro['cidade']) ? $filtro['cidade'] : '';
$imovelTipoId = isset($filtro['imovel_tipo']) ? $filtro['imovel_tipo'] : '';
$qtdDormitorio = isset($filtro['qtd_dormitorio']) ? $filtro['qtd_dormitorio'] : '';
$categoriaServico = isset($filtro['categoria_servico']) ? $filtro['categoria_servico'] : '';
@endphp

<div class="row">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s6 m4">
			<input type="hidden" id="cidade_hide" value="{{ $cidadeId }}">
			<select id="estado_id" name="estado" class="validate" onchange="realImovel.getCidades(this);">
				<option value="">Todos os Estados</option>
				@foreach($estados as $estado)
					<option value="{{ $estado->id }}" {{ $estadoId == $estado->id ? 'selected' : '' }} >{{ $estado->nome }}</option>
				@endforeach
			</select>
			<label>Estado</label>
		</div>
		<div class="input-field col s6 m4">
			<select id="cidade_id" name="cidade" class="validate">
				<option value="">Todas as Cidades</option>
				@foreach($cidades as $cidade)
					<option value="{{ $cidade->id }}" {{ $cidadeId == $cidade->id ? 'selected' : '' }} >{{ $cidade->nome }}</option>
				@endforeach
			</select>
			<label>Cidade</label>
		</div>
		<div class="input-field col s6 m4">
			<select name="categoria_servico" onchange="realImovel.home.carregarPrecos(this);">
				<option {{ $categoriaServico == '' ? 'selected' : ''}} value="">Todas as Categorias e Serviços</option>
				<option {{ $categoriaServico == 1 ? 'selected' : ''}} value="1">Venda</option>
				<option {{ $categoriaServico == 2 ? 'selected' : ''}} value="2">Aluguel</option>
			</select>
			<label>Categoria ou Serviço</label>
		</div>
		<div class="input-field col s6 m3">
			<select name="imovel_tipo">
			<option value="">Todos os Tipos</option>
			@foreach($tipos as $tipo)
				<option value="{{ $tipo->id }}" {{ $imovelTipoId == $tipo->id ? 'selected' : '' }} >{{ $tipo->nome }}</option>
			@endforeach
			</select>
			<label>Tipo de Imóvel</label>
		</div>
		<div class="input-field col s6 m3">
			<select name="valor" id="precos">
				<option {{ $valor == 0 ? 'selected' : ''}} value="">Todos os Valores</option>
				<option {{ $valor == 1 ? 'selected' : ''}} value="1">Até R$ 500,00</option>
				<option {{ $valor == 2 ? 'selected' : ''}} value="2">De R$500,00 até R$1.000,00</option>
				<option {{ $valor == 3 ? 'selected' : ''}} value="3">De R$1.000,00 até R$1.500,00</option>
				<option {{ $valor == 4 ? 'selected' : ''}} value="4">De R$1.500,00 até R$2.000,00</option>
				<option {{ $valor == 5 ? 'selected' : ''}} value="5">De R$2.000,00 até R$2.500,00</option>
				<option {{ $valor == 6 ? 'selected' : ''}} value="6">De R$2.500,00 até R$3.000,00</option>
			<!--<option {{ $valor == 7 ? 'selected' : ''}} value="7">De R$100.000,00 até R$300.000,00</option>
				<option {{ $valor == 8 ? 'selected' : ''}} value="8">De R$300.000,00 até R$500.000,00</option>
				<option {{ $valor == 9 ? 'selected' : ''}} value="9">De R$500.000,00 até R$700.000,00</option>
				<option {{ $valor == 10 ? 'selected' : ''}} value="10">De R$700.000,00 até R$900.000,00</option>
				<option {{ $valor == 11 ? 'selected' : ''}} value="11">De R$900.000,00 até R$1.100.000,00</option>
				<option {{ $valor == 12 ? 'selected' : ''}} value="12">De R$1.100.000,00 até R$1.300.000,00</option>
				<option {{ $valor == 13 ? 'selected' : ''}} value="13">Acima de R$1.300.000,00</option> -->
			</select>
			<label>Preços</label>
		</div>
		<div class="input-field col s6 m4">
			<select name="qtd_dormitorio">
				<option {{ $qtdDormitorio == 0 ? 'selected' : ''}} value="0">Independente da Quantidade</option>
				<option {{ $qtdDormitorio == 1 ? 'selected' : ''}} value="1">1</option>
				<option {{ $qtdDormitorio == 2 ? 'selected' : ''}} value="2">2</option>
				<option {{ $qtdDormitorio == 3 ? 'selected' : ''}} value="3">3</option>
				<option {{ $qtdDormitorio == 4 ? 'selected' : ''}} value="4">4</option>
				<option {{ $qtdDormitorio == 5 ? 'selected' : ''}} value="5">Mais</option>
			</select>
			<label>Dormitórios</label>
		</div>
		<div class="input-field col s12 m2">
			<button id="button" class="btn">Filtrar</button>
		</div>
	</form>
</div>

@section('js')
<script>
	$(function(){
		var estadoId = $('#estado_id').val();

		if (estadoId !== '') {
			realImovel.getCidades('#estado_id', function() {
				var cidadeId = $('#cidade_hide').val();
				$('#cidade_id').val(cidadeId);
				$('select').material_select();
			});
		}
	});
</script>
@endsection