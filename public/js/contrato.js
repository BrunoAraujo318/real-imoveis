var realImovel = realImovel || {};

realImovel.contrato = (function ($) {

	/**
	 * Inicializa o modulo.
	 */
	var iniciar = function() {
    };

    var salvar = function(form) {
        var imovelId = $('#imovel_id_hidden').val();
        var aquivo = $('#arquivo').get(0).files.length;

        if (aquivo != 0) {

            var dados = new FormData(form);

            $.ajax({
                type :'post',
                url : getPath('/admin/imovel/contrato'),
                data : dados,
                enctype: 'multipart/form-data',
                cache : false,
                dataType: 'json',
                contentType : false,
                processData : false,
                error : function(response) {
                    console.log(response);
                },
                success: function(response) {
                    console.log(response);
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
