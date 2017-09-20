<h3>Dados</h3>
<div class="input-field col s12">
	<input type="text" name="nome" class="validate" value="{{ isset($imovel->nome) ? $imovel->nome : '' }}">
	<label>Título</label>
</div>
<div class="input-field col s12">
	<input type="text" name="descricao" class="validate" value="{{ isset($imovel->descricao) ? $imovel->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field col s12">
	<select name="categoria_servico">
		<option value="1" {{(isset($imovel->categoria_servico) && $imovel->categoria_servico == '1' ? 'selected' : '')}}">Venda</option>
		<option value="2" {{(isset($imovel->categoria_servico) && $imovel->categoria_servico == '2' ? 'selected' : '')}}">Aluguel</option>
	</select>
	<label>Categoria e Serviço</label>
</div>
<div class="input-field col s12">
	<select name="imovel_tipo_id">
	@foreach($tipos as $tipo)
		<option value="{{ $tipo->id }}" {{(isset($imovel->imovel_tipo_id) && $imovel->imovel_tipo_id == $tipo->id ? 'selected' : '')}}">{{ $tipo->titulo }}</option>
	@endforeach
	</select>
	<label>Tipo de Imóvel</label>
</div>
<div class="input-field col s12">
	<input type="text" name="valor" class="validate" value="{{ isset($imovel->valor) ? $imovel->valor : '' }}">
	<label>Valor (Ex: 345.90)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="qtd_dormitorio" class="validate" value="{{ isset($imovel->qtd_dormitorio) ? $imovel->qtd_dormitorio : '' }}">
	<label>Dormitorios (Ex: 3)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="url_video" class="validate" value="{{ isset($imovel->url_video) ? $imovel->url_video : '' }}">
	<label>URL do Vídeo</label>
</div>

<h3>Endereço</h3>
<div class="input-field col s12">
	<input type="text" name="logradouro" class="validate" value="{{ isset($endereco->logradouro) ? $imovel->logradouro : '' }}">
	<label>Logradouro</label>
</div>
<div class="input-field col s12">
	<input type="text" name="numero" class="validate" value="{{ isset($endereco->numero) ? $imovel->numero : '' }}">
	<label>Número</label>
</div>
<div class="input-field col s12">
	<input type="text" name="complemento" class="validate" value="{{ isset($endereco->complemento) ? $imovel->complemento : '' }}">
	<label>Complemento</label>
</div>
<div class="input-field col s12">
	<input type="text" name="cep" class="validate" value="{{ isset($endereco->cep) ? $imovel->cep : '' }}">
	<label>CEP</label>
</div>
<div class="input-field col s12">
	<input type="text" name="bairro" class="validate" value="{{ isset($endereco->bairro) ? $imovel->bairro : '' }}">
	<label>Bairro</label>
</div>

<h3>Imagem</h3>
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
		<img width="120" src="{{ asset($imovel->imagem) }}">
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
