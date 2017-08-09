<div class="input-field">
	<input type="text" name="titulo" class="validate" value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
	<label>Título</label>
</div>
<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}">
	<label>Descrição</label>
</div>
@if(isset($pagina->email))
<div class="input-field">
	<input type="email" name="email" class="validate" value="{{ isset($pagina->email) ? $pagina->email : '' }}">
	<label>E-mail</label>
</div>

<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
			<input type="file" name="imagem">
		</div>
		<div class="file-path wrapper">
			<input type="text" class="file-path validade">
		</div>
	</div>
	<div class="col m6 s12">
		@if(isset($pagina->imagem))
			<img src="{{ asset($pagina->imagem) }}">
		@endif
	</div>
</div>
@endif