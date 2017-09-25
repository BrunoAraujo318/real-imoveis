/**
 * Modulo raiz baseado na especificação "Revealing Module Pattern" (http://opensource.locaweb.com.br/locawebstyle/documentacao/praticas/javascript/)
 */
var realImovel = (function () {

	/**
	 * Inicializa o modulo.
	 */
	var iniciar = function () {
		adicionarMascaras();
		loadAjax();
		closeLoadAjax();
		/*
		getCidades('#estado_id', function() {
			var cidadeId = $('#cidade_hide_id').val();
			$('#cidade_id').val();
			$('select').material_select();
		});
		*/
	}

	/**
	 * Retorna as cidades conforme estadoId informado.
	 *
	 * @param estadoId
	 * @param callback
	 */
	var getCidades = function (estadoId, callback) {
		var id = $(estadoId).val();

		if (id != '') {
			$.ajax({
				url: getPath('cidades/'+id),
				method: 'get',
				dataType : 'json',
				success: function (response) {
					var cidades = templateCidade(response.data);

					$('#cidade_id').html(cidades);
					$('select').material_select();

					if (callback != undefined) {
						callback();
					}
				},
				error: function (response) {
					console.log(response);
				}
			});
		}
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

		// mascara de cep
		$('.cep').mask('00.000-000');

		// mascara de dinheiro
		$('.money').mask("#.##0,00", {reverse: true});

	}

	/**
	 * Exibe o load quando ajax for disparado.
	 */
	var loadAjax = function() {
		$(document).ajaxStart(function() {
			$.LoadingOverlay("show");
            $('.btn-disabled').attr({'disabled':'enabled'});
		});
	};

	/**
	 * Oculta load quando ajax finalizar.
	 */
	var closeLoadAjax = function() {
		$(document).ajaxComplete(function() {
            $.LoadingOverlay("hide");
        });
	};

	/**
	 * Retorna api publica.
	 */
	return {
		iniciar : iniciar,
		getCidades : getCidades
	}

})();
