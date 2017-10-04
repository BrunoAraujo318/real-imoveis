<h4>Dados do imovel</h4>
<div class="input-field col s12">
	<input type="text" name="imovel[nome]" maxlength="80" value="{{old('imovel.nome', $imovel->nome)}}"
		   class="validate @if($errors->has('imovel.nome')) invalid @endif">
	<label @if($errors->has('imovel.nome')) data-error="{{$errors->first('imovel.nome')}}" @endif >Título</label>
</div>
<div class="input-field col s12">
	<textarea name="imovel[descricao]" class="validate materialize-textarea">{{ old('imovel.descricao', $imovel->descricao) }}</textarea>
	<label>Descrição</label>
</div>
<div class="input-field col s6">
	@php $categoriaServico = old('imovel.categoria_servico', $imovel->categoria_servico) @endphp
	<select name="imovel[categoria_servico]">
		<option value="1" {{ $categoriaServico == '1' ? 'selected' : '' }} >Venda</option>
		<option value="2" {{ $categoriaServico == '2' ? 'selected' : '' }} >Aluguel</option>
	</select>
	<label>Categoria e Serviço</label>
</div>
<div class="input-field col s6">
	@php $imovelTipoId = old('imovel.imovel_tipo_id', $imovel->imovel_tipo_id) @endphp
	<select name="imovel[imovel_tipo_id]">
	@foreach($tipos as $tipo)
		<option value="{{ $tipo->id }}" {{ $imovelTipoId == $tipo->id ? 'selected' : '' }} >{{ $tipo->nome }}</option>
	@endforeach
	</select>
	<label>Tipo de Imóvel</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[valor]" class="money validate @if($errors->has('imovel.valor')) invalid @endif " value="{{ old('imovel.valor', $imovel->valor) }}" />
	<label @if($errors->has('imovel.valor')) data-error="{{$errors->first('imovel.valor')}}" @endif >Valor (Ex: 345,90)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[qtd_dormitorio]" class="validate" value="{{ old('imovel.qtd_dormitorio', $imovel->qtd_dormitorio) }}" />
	<label>Dormitorios (Ex: 3)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[qtd_cozinha]" class="validate" value="{{ old('imovel.qtd_cozinha', $imovel->qtd_cozinha) }}" />
	<label>Cozinha (Ex: 1)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[qtd_banheiro]" class="validate" value="{{ old('imovel.qtd_banheiro', $imovel->qtd_banheiro) }}" />
	<label>Banheiros (Ex: 4)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[qtd_garagem]" class="validate" value="{{ old('imovel.qtd_garagem', $imovel->qtd_garagem) }}" />
	<label>Garagem (Ex: 2)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[url_video]" class="validate" value="{{ old('imovel.url_video', $imovel->url_video) }}" />
	<label>URL do Vídeo</label>
</div>

<h4>Endereço</h4>
<div class="input-field col s6">
	<input type="hidden" id="cidade_hide_id" value="{{ old('endereco.cidade_id') }}">
	<select id="estado_id" name="endereco[estado_id]" class="validate @if($errors->has('endereco.estado_id')) invalid @endif" onchange="realImovel.getCidades(this);">
		<option value="">Selecione...</option>
		@foreach($estados as $estado)
			<option value="{{ $estado->id }}" {{ $estadoId == $estado->id ? 'selected' : '' }} >{{ $estado->nome }}</option>
		@endforeach
	</select>
	<label @if($errors->has('endereco.estado_id')) data-error="{{$errors->first('endereco.estado_id')}}" @endif >Estado</label>
</div>
<div class="input-field col s6">
	<select id="cidade_id" name="endereco[cidade_id]" class="validate @if($errors->has('endereco.cidade_id')) invalid @endif">
		<option value="">Selecione...</option>
		@foreach($cidades as $cidade)
			<option value="{{ $cidade->id }}" {{ $cidadeId == $cidade->id ? 'selected' : '' }} >{{ $cidade->nome }}</option>
		@endforeach
	</select>
	<label @if($errors->has('endereco.cidade_id')) data-error="{{$errors->first('endereco.cidade_id')}}" @endif >
	Cidade
	</label>
</div>
<div class="input-field col s6">
	<input type="text" name="endereco[logradouro]" maxlength="50" class="validate @if($errors->has('endereco.logradouro')) invalid @endif" value="{{ old('imovel.logradouro', $endereco->logradouro) }}" />
	<label @if($errors->has('endereco.logradouro')) data-error="{{$errors->first('endereco.logradouro')}}" @endif>Logradouro</label>
</div>
<div class="input-field col s6">
	<input type="text" name="endereco[bairro]" maxlength="50" class="validate @if($errors->has('endereco.bairro')) invalid @endif" value="{{ old('endereco.bairro', $endereco->bairro) }}">
	<label @if($errors->has('endereco.bairro')) data-error="{{$errors->first('endereco.bairro')}}" @endif>Bairro</label>
</div>
<div class="input-field col s6">
	<input type="text" name="endereco[numero]" maxlength="6" class="validate @if($errors->has('endereco.numero')) invalid @endif" value="{{ old('endereco.numero', $endereco->numero) }}" />
	<label @if($errors->has('endereco.numero')) data-error="{{$errors->first('endereco.numero')}}" @endif>Número</label>
</div>
<div class="input-field col s6">
	<input type="text" name="endereco[cep]" class="cep validate @if($errors->has('endereco.cep')) invalid @endif" value="{{ old('endereco.cep', $endereco->cep) }}">
	<label @if($errors->has('endereco.cep')) data-error="{{$errors->first('endereco.cep')}}" @endif>CEP</label>
</div>
<div class="input-field col s12">
	<input type="text" name="endereco[complemento]" maxlength="50" class="validate" value="{{ old('endereco.complemento', $endereco->complemento) }}" />
	<label>Complemento</label>
</div>

<h4>Imagem</h4>
<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
		<span>Imagem</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validade">
		</div>
	</div>
	<div class="col m6 s12">
		<img width="120" src="{{ $imovel->imagem }}" id="imag-principal">
	</div>
</div>

<div class="row">
	<div class="file-field input-field col m12 s12">
		<div class="btn">
		<span>Upload de Imagens</span>
			<input type="file" multiple name="imagens[]">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validade">
		</div>
	</div>
</div>
