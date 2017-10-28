<div class="input-field">
	<input type="text" name="titulo" class="validate" value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
	<label>Título</label>
</div>
<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field">
	<textarea type="text" name="texto" class="materialize-textarea">{{ old('texto', $pagina->texto) }}</textarea>
	<label>Texto</label>
</div>
<h4>Imagem</h4>
<div class="row">
	<div class="col m6 s12">
		@if(isset($pagina->imagem))
			<img width="300" src="{{ asset($pagina->imagem) }}" id="imag-principal">
		@endif
	</div>
</div>
<div class="row">
	<div class="file-field input-field col m6 s12">
		<div id="button_upload" class="btn">
			<span>Escolher Imagem</span>
			<input type="file" name="imagem" onchange="realImovel.arquivo.readURL(this, '#imag-principal');">
		</div>
	</div>
</div>
