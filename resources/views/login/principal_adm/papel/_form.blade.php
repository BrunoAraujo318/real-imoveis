<div class="input-field">
	<input type="text" name="name" class="validate" value="{{ isset($registro->name) ? $registro->name : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input type="text" name="description" class="validate" value="{{ isset($registro->description) ? $registro->description : '' }}">
	<label>Descrição</label>
</div>

