function ApplyVencedorasFilters($estados, $categorias, $ciclo, $current_page) {
	var params = 'action=filter_vencedoras';
	params += '&estado='+$estados;
	params += '&categoria='+$categorias;
	params += '&ciclo='+$ciclo;

	winner_estado = $estados;
	winner_categoria = $categorias;
	winner_ciclo = $ciclo;

	jQuery.ajax({
		url: VencedorasAjax.ajaxurl,
		type: 'POST',
		dataType: 'html',
		data: params,
		beforeSend: function() {
			jQuery('.container-vencedoras').empty();
			jQuery('.container-vencedoras').append('<div class="loading-gif"><div class="support-box"></div><img src="'+templateDir+'/images/ring-vencedoras.gif" alt="loading gif"><div class="support-box"></div></div>');
		},
		success: function(response) {
			jQuery('.container-vencedoras').empty();
			jQuery('.container-vencedoras').append(response);

			current_page_casos = jQuery('.container-vencedoras .wpo-pagination li .page-numbers.current').text();
			jQuery('.container-vencedoras .wpo-pagination li a.page-numbers').each(function(index, el) {
				jQuery(this).removeAttr('href');
				jQuery(this).attr('data-page', jQuery(this).text());
			});

			jQuery('.vencedora-mostrar-info').click(function() {
				if (jQuery(this).hasClass('closed')) {
					var $this = jQuery(this);
					jQuery(this).removeClass('closed').addClass('opened');
					jQuery(this).next().slideDown('400', function() {
						$this.children().removeClass('fa-caret-down').addClass('fa-caret-up');
					});
				} else if (jQuery(this).hasClass('opened')) {
					var $this = jQuery(this);
					jQuery(this).removeClass('opened').addClass('closed');
					jQuery(this).next().slideUp('400', function() {
						$this.children().removeClass('fa-caret-up').addClass('fa-caret-down');
					});
				}
			});

			jQuery('.container-vencedoras .wpo-pagination li a.page-numbers').click(function(e) {
				e.preventDefault();
				WinnerPagination(jQuery(this).data('page'), jQuery('.container-vencedoras .wpo-pagination li .page-numbers.current').text());
			});

			jQuery('.vencedoras-item').each(function() {
				var maior_altura = 0;

				if (jQuery(this).children('.vencedoras-content').height() > maior_altura)
					maior_altura = jQuery(this).children('.vencedoras-content').height();
				if (jQuery(this).children('.vencedora-local').height() > maior_altura)
					maior_altura = jQuery(this).children('.vencedora-local').height();
				if (jQuery(this).children('.vencedora-premio-container').height() > maior_altura)
					maior_altura = jQuery(this).children('.vencedora-premio-container').height();

				jQuery(this).children('.vencedoras-content').height(maior_altura);
				jQuery(this).children('.vencedora-local').height(maior_altura);
				jQuery(this).children('.vencedora-premio-container').height(maior_altura);
			});
		}
	});
}

function WinnerPagination($page, $current_page) {
	if ($page == 'Next')
		$page = parseInt($current_page) + 1;
	if ($page == 'Previous')
		$page = parseInt($current_page) - 1;
	
	var params = 'action=filter_vencedoras';
	params += '&page='+$page;
	params += '&estado='+winner_estado;
	params += '&categoria='+winner_categoria;
	params += '&ciclo='+winner_ciclo;

	jQuery.ajax({
		url: VencedorasAjax.ajaxurl,
		type: 'POST',
		dataType: 'html',
		data: params,
		beforeSend: function() {
			jQuery('body,html').animate({
		        scrollTop: jQuery(".container-vencedoras").offset().top - 300
		    }, 1000);
			jQuery('.container-vencedoras').empty();
			jQuery('.container-vencedoras').append('<div class="loading-gif"><div class="support-box"></div><img src="'+templateDir+'/images/ring-vencedoras.gif" alt="loading gif"><div class="support-box"></div></div>');
		},
		success: function(response) {
			jQuery('.container-vencedoras').empty();
			jQuery('.container-vencedoras').append(response);

			current_page_casos = jQuery('.container-vencedoras .wpo-pagination li .page-numbers.current').text();
			jQuery('.container-vencedoras .wpo-pagination li a.page-numbers').each(function(index, el) {
				jQuery(this).removeAttr('href');
				jQuery(this).attr('data-page', jQuery(this).text());
			});

			jQuery('.container-vencedoras .wpo-pagination li a.page-numbers').click(function(e) {
				e.preventDefault();
				WinnerPagination(jQuery(this).data('page'), jQuery('.container-vencedoras .wpo-pagination li .page-numbers.current').text());
			});

			jQuery('.vencedora-mostrar-info').click(function() {
				if (jQuery(this).hasClass('closed')) {
					var $this = jQuery(this);
					jQuery(this).removeClass('closed').addClass('opened');
					jQuery(this).next().slideDown('400', function() {
						$this.children().removeClass('fa-caret-down').addClass('fa-caret-up');
					});
				} else if (jQuery(this).hasClass('opened')) {
					var $this = jQuery(this);
					jQuery(this).removeClass('opened').addClass('closed');
					jQuery(this).next().slideUp('400', function() {
						$this.children().removeClass('fa-caret-up').addClass('fa-caret-down');
					});
				}
			});

			jQuery('.vencedoras-item').each(function() {
				var maior_altura = 0;

				if (jQuery(this).children('.vencedoras-content').height() > maior_altura)
					maior_altura = jQuery(this).children('.vencedoras-content').height();
				if (jQuery(this).children('.vencedora-local').height() > maior_altura)
					maior_altura = jQuery(this).children('.vencedora-local').height();
				if (jQuery(this).children('.vencedora-premio-container').height() > maior_altura)
					maior_altura = jQuery(this).children('.vencedora-premio-container').height();

				jQuery(this).children('.vencedoras-content').height(maior_altura);
				jQuery(this).children('.vencedora-local').height(maior_altura);
				jQuery(this).children('.vencedora-premio-container').height(maior_altura);
			});
		}
	});
}