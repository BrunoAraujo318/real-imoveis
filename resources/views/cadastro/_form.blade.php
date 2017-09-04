<div class="input-field">
	<input type="text" name="nome" class="validate" value="{{ isset($usuario->nome) ? $usuario->nome : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input type="email" name="email" class="validate" value="{{ isset($usuario->email) ? $usuario->email : '' }}">
	<label>E-mail</label>
</div>
<div class="input-field">
	<input type="text" name="cpf" class="validate" value="{{ isset($usuario->cpf) ? $usuario->cpf : '' }}">
	<label>CPF</label>
</div>
<div class="input-field">
	<input type="text" name="nascimento" class="validate" value="{{ isset($usuario->nascimento) ? $usuario->nascimento : '' }}">
	<label>Data de Nascimento</label>
</div>
<div class="input-field">
	<input type="password" name="senha" class="validate">
	<label>Senha</label>
</div>