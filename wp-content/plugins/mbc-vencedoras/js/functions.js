var winner_estado;
var winner_categoria;
var winner_ciclo;
var current_page_casos;

jQuery(document).ready(function($) {
	$('#filter-estados').customSelect();
	$('#filter-categorias').customSelect();
	$('#filter-ciclo').customSelect();

	winner_estado = $('#filter-estados').val();
	winner_categoria = $('#filter-categorias').val();
	winner_ciclo = $('#filter-ciclo').val();
	$('.btn-vencedoras-filters').click(function() {
		ApplyVencedorasFilters($('#filter-estados').val(), $('#filter-categorias').val(), $('#filter-ciclo').val(), $('.container-vencedoras .wpo-pagination li .page-numbers.current').text());
	});

	current_page_casos = $('.container-vencedoras .wpo-pagination li .page-numbers.current').text();
	$('.container-vencedoras .wpo-pagination li a.page-numbers').each(function(index, el) {
		$(this).removeAttr('href');
		$(this).attr('data-page', $(this).text());
	});

	$('.container-vencedoras .wpo-pagination li a.page-numbers').click(function(e) {
		e.preventDefault();
		WinnerPagination($(this).data('page'), $('.container-vencedoras .wpo-pagination li .page-numbers.current').text());
	});

	$('.vencedora-mostrar-info').click(function() {
		if ($(this).hasClass('closed')) {
			var $this = $(this);
			$(this).removeClass('closed').addClass('opened');
			$(this).next().slideDown('400', function() {
				$this.children().removeClass('fa-caret-down').addClass('fa-caret-up');
			});
		} else if ($(this).hasClass('opened')) {
			var $this = $(this);
			$(this).removeClass('opened').addClass('closed');
			$(this).next().slideUp('400', function() {
				$this.children().removeClass('fa-caret-up').addClass('fa-caret-down');
			});
		}
	});
});