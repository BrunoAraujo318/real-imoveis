<div class="input-field">
	<input type="text" name="nome" class="validate @if($errors->has('nome')) invalid @endif" 
		value="{{ isset($usuario->nome) ? $usuario->nome : '' }}{{old('nome')}}">
	<label @if($errors->has('nome')) data-error="{{$errors->first('nome')}}" @endif>
		Nome
	</label>
</div>

<div class="input-field">
	<input type="text" name="endereco" class="validate">
	<label>Endereço</label>
</div>

<div class="input-field">
	<input type="text" name="Contato" class="validate">
	<label>Contato</label>
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