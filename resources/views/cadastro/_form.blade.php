<div class="input-field">
	<input type="text" name="nome" class="validate @if($errors->has('nome')) invalid @endif" 
		value="{{ isset($usuario->nome) ? $usuario->nome : '' }}{{old('nome')}}">
	<label @if($errors->has('nome')) data-error="{{$errors->first('nome')}}" @endif>
		Nome
	</label>
</div>

<div class="input-field">
	<input type="date" name="nascimento" class="validate @if($errors->has('nascimento')) invalid @endif" 
		value="{{ isset($usuario->nascimento) ? $usuario->nascimento : '' }}{{old('nascimento')}}">
	<label @if($errors->has('nascimento')) data-error="{{$errors->first('nascimento')}}" @endif>
		
	</label>
</div>

<div class="input-field">
	<input type="text" name="cpf" class="validate @if($errors->has('cpf')) invalid @endif" 
		value="{{ isset($usuario->cpf) ? $usuario->cpf : '' }}{{old('cpf')}}" />
	<label @if($errors->has('cpf')) data-error="{{$errors->first('cpf')}}" @endif>
		CPF
	</label>
</div>

<div class="input-field">
	<input type="text" name="endereco" class="validate @if($errors->has('endereco')) invalid @endif" 
		value="{{ isset($usuario->endereco) ? $usuario->endereco : '' }}{{old('endereco')}}">
	<label @if($errors->has('endereco')) data-error="{{$errors->first('endereco')}}" @endif>
		Endereço
	</label>
</div>

<div class="input-field">
	<input type="text" name="contato" class="validate @if($errors->has('contato')) invalid @endif" 
		value="{{ isset($usuario->contato) ? $usuario->contato : '' }}{{old('contato')}}">
	<label @if($errors->has('contato')) data-error="{{$errors->first('contato')}}" @endif>
		Telefone
	</label>
</div>

<div class="input-field">
	<input type="email" name="email" class="validate @if($errors->has('email')) invalid @endif" 
		value="{{ isset($usuario->email) ? $usuario->email : '' }}{{old('email')}}" />
	<label @if($errors->has('email')) data-error="{{$errors->first('email')}}" @endif>
		E-mail
	</label>
</div>

<div class="input-field">
	<input type="password" name="password" class="validate">
	<label>Senha</label>
</div>