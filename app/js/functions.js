$(document).ready(function(){

	$('#add-user-form').on('submit', function(e){
		var data = $('#user-input').val();

		if (data.length < 1) {
			
			$('#user-input').addClass('error');
			e.preventDefault();
			return
		
		} else {
			
			$('#user-input').removeClass('error');
			return
		}
		
	})

	$('#log-game-form').on('submit', function(e){
		
		$('.score-input').each(function(){
			var data = $(this).val();
			var that = $(this);
			if (data.length < 1){
				e.preventDefault();
				that.addClass('error');
			} else {
				that.removeClass('error');
			}
		})
	});

  	$(".owl-carousel").owlCarousel({
  		animateOut: 'slideOutUp',
    	animateIn: 'slideInUp',
  		loop:true,
  		autoplay:true,
  		items:1,
  		smartSpeed:100
  	});
	$('select').selectize({
	    //sortField: 'text'
	    placeholder: 'Select Player',
	});		

	$('.mobile-menu').on('click', function(){
		$('.nav').slideToggle();
		if ( $(this).text() === 'Menu'){
			$(this).text('Close');
		} else {
			$(this).text('Menu');
		}
	});
});




$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}