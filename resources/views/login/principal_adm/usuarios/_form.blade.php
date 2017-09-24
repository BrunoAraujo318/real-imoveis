<div class="input-field">
	<input type="text" name="usuario[nome]" maxlength="100" class="validate @if($errors->has('usuario.nome')) invalid @endif" value="{{old('usuario.nome', $usuario->nome)}}">
	<label @if($errors->has('usuario.nome')) data-error="{{$errors->first('usuario.nome')}}" @endif>
		Nome
	</label>
</div>

<div class="input-field">
	<input type="text" name="usuario[nascimento]" maxlength="10" class="date validate @if($errors->has('usuario.nascimento')) invalid @endif" value="{{old('usuario.nascimento', $usuario->nascimento->format('d/m/Y'))}}">
	<label @if($errors->has('usuario.nascimento')) data-error="{{$errors->first('usuario.nascimento')}}" @endif>
		Nascimento
	</label>
</div>

<div class="input-field">
	<input type="text" name="usuario[cpf]" maxlength="14" class="cpf validate @if($errors->has('usuario.cpf')) invalid @endif" value="{{old('usuario.cpf', $usuario->cpf)}}" />
	<label @if($errors->has('usuario.cpf')) data-error="{{$errors->first('usuario.cpf')}}" @endif>
		CPF
	</label>
</div>

<div class="input-field">
	<input type="text" name="telefone" maxlength="14" class="phone_with_ddd validate" value="" />
	<label>
		Telefone
	</label>
</div>

<div class="input-field">
	<select id="perfil_id" name="perfil_id">
		<option>Selecione...</option>
		@foreach($perfis as $perfil)
			<option value="{{ $perfil->id }}">{{ $perfil->display_name }}</option>
		@endforeach
	</select>
	<label>Perfil</label>
</div>

<div class="row">
	<div class="input-field col s6">
		<input type="email" name="usuario[email]" maxlength="80" class="validate @if($errors->has('usuario.email')) invalid @endif" value="{{old('usuario.email',  $usuario->email)}}" />
		<label @if($errors->has('usuario.email')) data-error="{{$errors->first('usuario.email')}}" @endif>
			E-mail
		</label>
	</div>

	<div class="input-field  col s6">
		<input type="password" maxlength="12" name="usuario[password]" class="validate @if($errors->has('usuario.password')) invalid @endif" />
		<label @if($errors->has('usuario.password')) data-error="{{$errors->first('usuario.password')}}" @endif>
			Senha
		</label>
	</div>
</div>

<h4>Endereço</h4>
<div class="row">
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
</div>

<div class="input-field">
	<input type="text" name="logradouro" class="validate" value="{{ old('endereco.logradouro', $endereco->logradouro) }}">
	<label>Logradouro</label>
</div>

<div class="input-field">
	<input type="text" name="numero" class="validate" value="{{ old('endereco.numero', $endereco->numero) }}">
	<label>Número</label>
</div>

<div class="input-field">
	<input type="text" name="complemento" class="validate" value="{{ old('endereco.complemento', $endereco->complemento) }}">
	<label>Complemento</label>
</div>

<div class="input-field">
	<input type="text" name="cep" class="cep validate" value="{{ old('endereco.cep', $endereco->cep) }}">
	<label>CEP</label>
</div>

<div class="input-field">
	<input type="text" name="bairro" class="validate" value="{{ old('endereco.bairro', $endereco->bairro) }}">
	<label>Bairro</label>
</div>

<br><br>