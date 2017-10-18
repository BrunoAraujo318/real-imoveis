var realImovel = realImovel || {};

realImovel.home = (function ($) {

    /**
	 * Inicializa o modulo.
	 */
    var iniciar = function () {
    }

    /**
     * TODO comentar ....
     *
     * @param elem
     */
    var carregarPrecos = function (elem) {
        var categoriaServico = $(elem).val();

        var html = '';

        var precosAluguel = [
            {id:1, valor:'Até R$ 500,00'},
            {id:2, valor:'De R$500,00 até R$1.000,00'},
            {id:3, valor:'De R$1.000,00 até R$1.500,00'},
            {id:4, valor:'De R$1.500,00 até R$2.000,00'},
            {id:5, valor:'De R$2.000,00 até R$2.500,00'},
            {id:6, valor:'De R$2.500,00 até R$3.000,00'},
        ];

        var precosVenda = [
            {id:7, valor:'De R$100.000,00 até R$300.000,00'},
            {id:8, valor:'De R$300.000,00 até R$500.000,00'},
            {id:9, valor:'De R$500.000,00 até R$700.000,00'},
            {id:10, valor:'De R$700.000,00 até R$900.000,00'},
            {id:11, valor:'De R$900.000,00 até R$1.100.000,00'},
            {id:12, valor:'De R$1.100.000,00 até R$1.300.000,00'},
            {id:13, valor:'Acima de R$1.300.000,00'},
        ];

        if (categoriaServico != null) {
            htmlValores = populaValoresPreco(precosAluguel);

            if (categoriaServico == 1) {
                htmlValores = populaValoresPreco(precosVenda);
            }

            $('#precos').html(htmlValores);
            $('select').material_select();
        }
    }

    /**
     * TODO comentar ....
     *
     * @param elem
     */
    var populaValoresPreco = function (precos) {
        var html = '<option value="">Todos os Valores</option>';

        precos.forEach(function(preco) {
            html += '<option value="'+preco.id+'">'+preco.valor+'</option>';
        });

        return html;
    }

    /**
     * Retorna api publica.
     */
    return {
        iniciar : iniciar,
        carregarPrecos : carregarPrecos
    };

})(jQuery);