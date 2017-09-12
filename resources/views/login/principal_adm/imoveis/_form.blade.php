<div class="input-field col s12">
	<input type="text" name="nome" class="validate" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label>Título</label>
</div>
<div class="input-field col s12">
	<input type="text" name="descricao" class="validate" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field col s12">
	<select name="categoria_servico">
		<option value="1" {{(isset($registro->categoria_servico) && $registro->categoria_servico == '1' ? 'selected' : '')}}">Venda</option>
		<option value="2" {{(isset($registro->categoria_servico) && $registro->categoria_servico == '2' ? 'selected' : '')}}">Aluguel</option>
	</select>
	<label>Categoria e Serviço</label>
</div>
<div class="input-field col s12">
	<select name="imovel_tipo_id">
	@foreach($tipos as $tipo)
		<option value="{{ $tipo->id }}" {{(isset($registro->imovel_tipo_id) && $registro->imovel_tipo_id == $tipo->id ? 'selected' : '')}}">{{ $tipo->titulo }}</option>
	@endforeach
	</select>
	<label>Tipo de Imóvel</label>
</div>
<div class="input-field col s12">
	<input type="text" name="endereco_id" class="validate" value="{{ isset($registro->endereco_id) ? $registro->endereco_id : '' }}">
	<label>Endereço</label>
</div>
<div class="input-field col s12">
	<input type="text" name="valor" class="validate" value="{{ isset($registro->valor) ? $registro->valor : '' }}">
	<label>Valor (Ex: 345.90)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="qtd_dormitorio" class="validate" value="{{ isset($registro->qtd_dormitorio) ? $registro->qtd_dormitorio : '' }}">
	<label>Dormitorios (Ex: 3)</label>
</div>
<div class="input-field col s12">
	<input type="text" name="url_video" class="validate" value="{{ isset($registro->url_video) ? $registro->url_video : '' }}">
	<label>URL do Vídeo</label>
</div>

<div class="input-field col s12">
	<input type="text" name="nome" class="validate" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label>Título</label>
</div>
<div class="input-field col s12">
	<input type="text" name="descricao" class="validate" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>

<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
		<span>Imagem</span>
			<input type="file" name="imagem_principal">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validade">
		</div>		
	</div>
	<div class="col m6 s12">
		<img width="120" src="{{ asset($registro->imagem_principal) }}">
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
