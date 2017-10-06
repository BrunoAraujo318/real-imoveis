var realImovel = realImovel || {};

realImovel.arquivo = (function ($) {

	/**
	 * Inicializa o modulo.
	 */
	var iniciar = function() {
    };

    /**
     * Display the image of load.
     *
     * @param input
     * @param destination
     */
    var readURL = function(input, destination) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
	            if($(destination).is('img')) {
                	$(destination).attr('src', e.target.result);
	            } else {
	            	$(destination).css("background-image", 'url('+e.target.result+')');
	            }
            };
            reader.onloadend = function() {
                showDivImage(destination);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            var img = input.value;
            if($(destination).is('img')) {
            	$(destination).attr('src', img);
            } else {
            	$(destination).css("background-image", 'url('+img+')');
            }
            showDivImage(destination);
        }
    }

    /**
     * Display and Hide the element div that contains the image.
     *
     * @param element
     */
    var showDivImage = function(element) {
        var image = $(element);

        image.parent().addClass('hide');
        if (image.attr('src') !== '') {
            image.parent().removeClass('hide');
        }
    }

	/**
	 * Return api public.
	 */
	return {
		iniciar : iniciar,
		readURL : readURL,
		showDivImage : showDivImage,
	};

})(jQuery);
