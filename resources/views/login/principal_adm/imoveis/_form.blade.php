<h4>Dados</h4>
<div class="input-field col s12">
	<input type="text" name="imovel[nome]"
		   class="validate @if($errors->has('imovel.nome')) invalid @endif"
		   value="{{ isset($imovel->nome) ? $imovel->nome : '' }}{{old('imovel.nome')}}">
	<label @if($errors->has('imovel.nome')) data-error="{{$errors->first('imovel.nome')}}" @endif >Título</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[descricao]" class="validate" value="{{ isset($imovel->descricao) ? $imovel->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field col s12">
	<select name="imovel[categoria_servico]">
		<option value="1" {{(isset($imovel->categoria_servico) && $imovel->categoria_servico == '1' ? 'selected' : '')}}">Venda</option>
		<option value="2" {{(isset($imovel->categoria_servico) && $imovel->categoria_servico == '2' ? 'selected' : '')}}">Aluguel</option>
	</select>
	<label>Categoria e Serviço</label>
</div>
<div class="input-field col s12">
	<select name="imovel[imovel_tipo_id]">
	@foreach($tipos as $tipo)
		<option value="{{ $tipo->id }}" {{(isset($imovel->imovel_tipo_id) && $imovel->imovel_tipo_id == $tipo->id ? 'selected' : '')}}">{{ $tipo->nome }}</option>
	@endforeach
	</select>
	<label>Tipo de Imóvel</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[valor]" class="validate" value="{{ isset($imovel->valor) ? $imovel->valor : '' }}">
	<label>Valor (Ex: 345.90)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[qtd_dormitorio]" class="validate" value="{{ isset($imovel->qtd_dormitorio) ? $imovel->qtd_dormitorio : '' }}">
	<label>Dormitorios (Ex: 3)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="imovel[url_video]" class="validate" value="{{ isset($imovel->url_video) ? $imovel->url_video : '' }}">
	<label>URL do Vídeo</label>
</div>

<h4>Endereço</h4>
<div class="input-field col s12">
	<input type="text" name="endereco[logradouro]" class="validate" value="{{ isset($endereco->logradouro) ? $endereco->logradouro : '' }}">
	<label>Logradouro</label>
</div>
<div class="input-field col s12">
	<input type="text" name="endereco[numero]" class="validate" value="{{ isset($endereco->numero) ? $endereco->numero : '' }}">
	<label>Número</label>
</div>
<div class="input-field col s12">
	<input type="text" name="endereco[complemento]" class="validate" value="{{ isset($endereco->complemento) ? $endereco->complemento : '' }}">
	<label>Complemento</label>
</div>
<div class="input-field col s12">
	<input type="text" name="endereco[cep]" class="validate" value="{{ isset($endereco->cep) ? $endereco->cep : '' }}">
	<label>CEP</label>
</div>
<div class="input-field col s12">
	<input type="text" name="endereco[bairro]" class="validate" value="{{ isset($endereco->bairro) ? $endereco->bairro : '' }}">
	<label>Bairro</label>
</div>
<div class="input-field col s6">
	<select id="estado_id" onchange="realImovel.getCidades(this);">
		<option>Selecione...</option>
		@foreach($estados as $estado)
			<option value="{{ $estado->id }}">{{ $estado->nome }}</option>
		@endforeach
	</select>
	<label>Estado</label>
</div>
<div class="input-field col s6">
	<select id="cidade_id" name="endereco[cidade_id]">
		<option>Selecione...</option>
	</select>
	<label>Cidade</label>
</div>

<h4>Imagem</h4>
<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
		<span>Imagem</span>
			<input type="file" name="imovel[imagem]">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validade">
		</div>
	</div>
	<div class="col m6 s12">
		<img width="120" src="">
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
