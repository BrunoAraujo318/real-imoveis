<div class="row">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s12 m4">
			<select name="valor">
				<option {{ isset($busca['categoria_servico']) && $busca['categoria_servico'] == 0 ? 'selected' : ''}} value="0">Todas as Categorias e Serviços</option>
				<option {{ isset($busca['categoria_servico']) && $busca['categoria_servico'] == 2 ? 'selected' : ''}} value="2">Aluguel</option>
				<option {{ isset($busca['categoria_servico']) && $busca['categoria_servico'] == 3 ? 'selected' : ''}} value="3">Venda</option>
			</select>
			<label>Categoria ou Serviço</label>
		</div>
		@php
		$estadoId = "";
		$cidadeId = "";
		$imovelTipoId = "";
		@endphp
		<div class="input-field col s4">
			<input type="hidden" id="cidade_hide_id" value="{{ old('endereco.cidade_id') }}">
			<select id="estado_id" name="endereco[estado_id]" class="validate @if($errors->has('endereco.estado_id')) invalid @endif" onchange="realImovel.getCidades(this);">
				<option value="">Todos os Estados</option>
				@foreach($estados as $estado)
					<option value="{{ $estado->id }}" {{ $estadoId == $estado->id ? 'selected' : '' }} >{{ $estado->nome }}</option>
				@endforeach
			</select>
			<label @if($errors->has('endereco.estado_id')) data-error="{{$errors->first('endereco.estado_id')}}" @endif >Estado</label>
		</div>
		<div class="input-field col s4">
			<select id="cidade_id" name="endereco[cidade_id]" class="validate @if($errors->has('endereco.cidade_id')) invalid @endif">
				<option value="">Todas as Cidades</option>
				@foreach($cidades as $cidade)
					<option value="{{ $cidade->id }}" {{ $cidadeId == $cidade->id ? 'selected' : '' }} >{{ $cidade->nome }}</option>
				@endforeach
			</select>
			<label @if($errors->has('endereco.cidade_id')) data-error="{{$errors->first('endereco.cidade_id')}}" @endif >Cidade</label>
		</div>
		<div class="input-field col s4">
			@php $imovelTipoId = old('imovel.imovel_tipo_id') @endphp
			<select name="imovel[imovel_tipo_id]">
			<option value="">Todos os Tipos</option>
			@foreach($tipos as $tipo)
				<option value="{{ $tipo->id }}" {{ $imovelTipoId == $tipo->id ? 'selected' : '' }} >{{ $tipo->nome }}</option>
			@endforeach
			</select>
			<label>Tipo de Imóvel</label>
		</div>
		<div class="input-field col s12 m3">
			<select name="valor">
				<option {{ isset($busca['valor']) && $busca['valor'] == 0 ? 'selected' : ''}} value="0">Todos os Valores</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 1 ? 'selected' : ''}} value="1">Até R$ 500,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 2 ? 'selected' : ''}} value="2">De R$500,00 até R$1.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 3 ? 'selected' : ''}} value="3">De R$1.000,00 até R$1.500,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 4 ? 'selected' : ''}} value="4">De R$1.500,00 até R$2.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 5 ? 'selected' : ''}} value="5">Acima de R$2.000,00</option>
			</select>
			<label>Preços</label>
		</div>
		<div class="input-field col s6 m3">
			<select name="dormitorios">
				<option {{ isset($busca['qtd_dormitorio']) && $busca['qtd_dormitorio'] == 0 ? 'selected' : ''}} value="0">Independente da Quantidade</option>
				<option {{ isset($busca['qtd_dormitorio']) && $busca['qtd_dormitorio'] == 1 ? 'selected' : ''}} value="1">1</option>
				<option {{ isset($busca['qtd_dormitorio']) && $busca['qtd_dormitorio'] == 2 ? 'selected' : ''}} value="2">2</option>
				<option {{ isset($busca['qtd_dormitorio']) && $busca['qtd_dormitorio'] == 3 ? 'selected' : ''}} value="3">3</option>
				<option {{ isset($busca['qtd_dormitorio']) && $busca['qtd_dormitorio'] == 4 ? 'selected' : ''}} value="4">Mais</option>
			</select>
			<label>Dormitórios</label>
		</div>
		<div class="input-field col s12 m2">
			<button id="button" class="btn">Filtrar</button>
		</div>
	</form>
</div>