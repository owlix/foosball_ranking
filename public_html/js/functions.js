$(document).ready(function(){

	$('#add-user-form').on('submit', function(e){
		var data = $('#user-input').val();

		if (data.length < 1) {
			$('#user-input').addClass('error');
			e.preventDefault();
			return
		}
		return
	})

	$('#log-game-form').on('submit', function(e){
		
		$('.score-input').each(function(){
			var data = $(this).val();
			var that = $(this);
			if (data.length < 1){
				e.preventDefault();
				that.addClass('error');
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