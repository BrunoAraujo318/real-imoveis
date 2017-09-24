/**
 * Modulo raiz baseado na especificação "Revealing Module Pattern" (http://opensource.locaweb.com.br/locawebstyle/documentacao/praticas/javascript/)
 */
var realImovel = (function () {

	/**
	 * Inicializa o modulo
	 */
	var iniciar = function () {
		adicionarMascaras();
	}

	/**
	 * Retorna as cidades conforme estadoId informado.
	 *
	 * @param estadoId
	 */
	var getCidades = function (estadoId) {
		$.ajax({
		  	url: getPath('cidades/'+$(estadoId).val()),
		  	method: 'get',
		  	dataType : 'json',
		  	success: function (response) {
		  		var cidades = templateCidade(response.data);

		  		$('#cidade_id').html(cidades);
		  		$('select').material_select();
		  	},
		  	error: function (response) {
		  		console.log(response);
		  	}
		});
	}

	/**
	 * Template para popular a combobox de cidades.
	 *
	 * @param cidades
	 * @return html
	 */
	var templateCidade = function (cidades) {
		var html = '<option value="">Selecione ...</option>';

		cidades.forEach(function(cidade) {
			html += '<option value="'+cidade.id+'">'+cidade.nome+'</option>';
		});

		return html;
	}

	/**
	 * Adiciona mascaras de acordo com os elementos e suas classes.
	 */
	var adicionarMascaras = function () {
		// mascara de datas
		$('.date').mask('00/00/0000');

		// mascara de cpf
		$('.cpf').mask('000.000.000-00', {reverse: true});

		// mascara de telefone
		$('.phone_with_ddd').mask('(00) 00000-0000');

	}

	/**
	 * Retorna api publica.
	 */
	return {
		iniciar : iniciar,
		getCidades : getCidades
	}

})();
