var realImovel = realImovel || {};

realImovel.contrato = (function ($) {

	/**
	 * Inicializa o modulo.
	 */
	var iniciar = function() {
        $('#dialog-mensagem').hide();
    };

    var salvar = function(form) {
        var imovelId = $('#imovel_id_hidden').val();
        var aquivo = $('#arquivo').get(0).files.length;
        $('#dialog-mensagem').hide();

        if (aquivo != 0) {

            var dados = new FormData(form);

            $.ajax({
                type :'post',
                url : getPath('admin/imovel/contrato/salvar'),
                data : dados,
                enctype: 'multipart/form-data',
                cache : false,
                dataType: 'json',
                contentType : false,
                processData : false,
                error : function(response) {
                    alert("Erro ao enviar o arquivo de contrato.");
                },
                success: function(response) {
                    $('#dialog-mensagem').show();
                    $('#content-mensagem').html(response.msg);

                    /*
                    setTimeout(function () {
                        $('#dialog-mensagem').hide();
                    }, 6000);
                    */
                }
            });
        }
    }

    /**
     * Adiciona evento de click para abrir selecão de arquivo.
     */
    var eventoClickFile = function () {
    	$('#arquivo').click(function() {
    	    $('input[name=file]').click();
    	});
    }

	/**
	 * Return api public.
	 */
	return {
        iniciar : iniciar,
        salvar : salvar
	};

})(jQuery);
