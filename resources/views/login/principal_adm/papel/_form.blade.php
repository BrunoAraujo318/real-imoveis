<div class="input-field">
	<input type="text" name="name" class="validate" value="{{ isset($papel->name) ? $papel->name : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input type="text" name="description" class="validate" value="{{ isset($papel->description) ? $papel->description : '' }}">
	<label>Descrição</label>
</div>

