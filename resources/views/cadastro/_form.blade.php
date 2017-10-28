<div class="input-field col s12 m12">
	<input type="text" name="nome" maxlength="100" class="validate @if($errors->has('nome')) invalid @endif" value="{{old('nome')}}">
	<label @if($errors->has('nome')) data-error="{{$errors->first('nome')}}" @endif>
		Nome
	</label>
</div>

<div class="input-field col s6 m6">
	<input type="text" name="nascimento" maxlength="10" class="date validate @if($errors->has('nascimento')) invalid @endif" value="{{old('nascimento')}}">
	<label @if($errors->has('nascimento')) data-error="{{$errors->first('nascimento')}}" @endif>
		Data de Nascimento
	</label>
</div>

<div class="input-field col s6 m6">
	<input type="text" name="cpf" maxlength="14" class="cpf validate @if($errors->has('cpf')) invalid @endif" value="{{old('cpf')}}" />
	<label @if($errors->has('cpf')) data-error="{{$errors->first('cpf')}}" @endif>
		CPF
	</label>
</div>

<div class="input-field col s12 m12">
	<input type="email" name="email" maxlength="80" class="validate @if($errors->has('email')) invalid @endif" value="{{old('email')}}" />
	<label @if($errors->has('email')) data-error="{{$errors->first('email')}}" @endif>
		E-mail
	</label>
</div>

<div class="input-field col s12 m12">
	<input type="password" maxlength="12" name="password" class="validate @if($errors->has('password')) invalid @endif" />
	<label @if($errors->has('password')) data-error="{{$errors->first('password')}}" @endif>
		Senha
	</label>
</div>
<br><br>