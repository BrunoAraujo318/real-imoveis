<div class="row">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s6 m4">
			<select name="condominio">
				<option {{ isset($busca['condominio']) && $busca['condominio'] == 'todos' ? 'selected' : ''}} value="todos">Todos</option>
				<option {{ isset($busca['condominio']) && $busca['condominio'] == 'sim' ? 'selected' : ''}} value="sim">Sim</option>
				<option {{ isset($busca['condominio']) && $busca['condominio'] == 'nao' ? 'selected' : ''}} value="nao">Não</option>
			</select>
			<label>Condomínio</label>
		</div>
		<div class="input-field col s6 m4">
			<select name="tipo_id">
				<option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == 'todos' ? 'selected' : ''}} value="todos">Todos os Tipos</option>
				@foreach($tipos as $tipo)
				<option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id ? 'selected' : ''}} value="{{$tipo->id}}">{{$tipo->titulo}}</option>
				@endforeach
			</select>
			<label>Tipo</label>
		</div>
		<div class="input-field col s6 m4">
			<select name="cidade_id">
				<option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == 'todas' ? 'selected' : ''}} value="todas">Todas as Cidade</option>
				@foreach($cidades as $cidade)
				<option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id ? 'selected' : ''}} value="{{$cidade->id}}">{{$cidade->nome}}</option>
				@endforeach
			</select>
			<label>Cidade</label>
		</div>
		<div class="input-field col s12 m4">
			<select name="valor">
				<option {{ isset($busca['valor']) && $busca['valor'] == 0 ? 'selected' : ''}} value="0">Todos os Valores</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 1 ? 'selected' : ''}} value="1">Até R$ 500,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 2 ? 'selected' : ''}} value="2">De R$500,00 até R$1.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 3 ? 'selected' : ''}} value="3">De R$1.000,00 até R$1.500,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 4 ? 'selected' : ''}} value="4">De R$1.500,00 até R$2.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 5 ? 'selected' : ''}} value="5">Acima de R$2.000,00</option>
			</select>
			<label>Preços Mensais</label>
		</div>
		<div class="input-field col s6 m3">
			<select name="dormitorios">
				<option {{ isset($busca['dormiorios']) && $busca['dormiorios'] == 0 ? 'selected' : ''}} value="0">Independente da Quantidade</option>
				<option {{ isset($busca['dormiorios']) && $busca['dormiorios'] == 1 ? 'selected' : ''}} value="1">1</option>
				<option {{ isset($busca['dormiorios']) && $busca['dormiorios'] == 2 ? 'selected' : ''}} value="2">2</option>
				<option {{ isset($busca['dormiorios']) && $busca['dormiorios'] == 3 ? 'selected' : ''}} value="3">3</option>
				<option {{ isset($busca['dormiorios']) && $busca['dormiorios'] == 4 ? 'selected' : ''}} value="4">Mais</option>
			</select>
			<label>Dormitórios</label>
		</div>
		<div class="input-field col s12 m3">
			<input class="validate" type="text" name="bairro" value="{{ isset($busca['bairro']) ? $busca['bairro'] : ''}} ">
			<label>Bairros</label>
		</div>
		<div class="input-field col s12 m2">
			<button class="btn deep-orange darken-1 right">Filtrar</button>
		</div>
	</form>
</div>