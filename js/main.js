$( document ).ready(function() {
	$('.scroll_down').click(function(e){
		e.preventDefault();
		var body = $("html, body");
		body.animate({scrollTop:474}, '500', 'swing', function() { 
		});
	});

	$('.alignleft, .alignright').hover(function(){
		var it = $(this);
		it.children('img').fadeTo( 200 , 0.4,function(){
			it.children('.wp-caption-text').show();
		});
	}, function(){
		var it = $(this);
		it.children('img').fadeTo( 200 , 1, function(){
			it.children('.wp-caption-text').hide();			
		});		
	});
	$('blockquote').prepend('<span>&ldquo;</span>');
	$('blockquote').append('<span>&rdquo;</span>');

	$(window).scroll(function() {
		console.log();
	    if ($(this).scrollTop() > 70) {
	        $( ".navigation").addClass('fixed');
	    } else {
	        $( ".navigation" ).removeClass('fixed');
	    }
	});	
});