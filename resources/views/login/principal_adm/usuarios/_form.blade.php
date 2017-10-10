<div class="input-field">
	<input type="text" name="usuario[nome]" maxlength="100" class="validate @if($errors->has('usuario.nome')) invalid @endif" value="{{old('usuario.nome', $usuario->nome)}}">
	<label @if($errors->has('usuario.nome')) data-error="{{$errors->first('usuario.nome')}}" @endif>
		Nome
	</label>
</div>

<div class="input-field">
	<input type="text" name="usuario[nascimento]" maxlength="10" class="date validate @if($errors->has('usuario.nascimento')) invalid @endif" value="{{old('usuario.nascimento', $usuario->nascimento)}}">
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
	<input type="text" name="telefone" maxlength="14" class="phone_with_ddd validate" />
	<label>
		Telefone
	</label>
</div>

<div class="input-field">
	@php $perfilId = old('perfil_id') @endphp
	<select id="perfil_id" name="perfil_id">
		<option value="">Selecione...</option>
		@foreach($perfis as $perfil)
			<option value="{{ $perfil->id }}" {{ $perfilId == $perfil->id ? 'selected' : '' }} >{{ $perfil->display_name }}</option>
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


<br><br>