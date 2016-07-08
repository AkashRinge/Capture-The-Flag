
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');
    
    $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    // next step
    $('.f1 .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	// fields validation
    	parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
    		if( $(this).val() == "" ) {
    			$(this).addClass('input-error');
    			next_step = false;
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		$(this).next().fadeIn();
	    		// scroll window to beginning of the form
    			scroll_to_class( $('.f1'), 20 );
	    	});
    	}
    	
    });
    
    // previous step
    $('.f1 .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		$(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( $('.f1'), 20 );
    	});
    });
    
    // submit
    $('.f1').on('submit', function(e) {
    	
    	// fields validation
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
        $(this).find('#f1-link').each(function() {
            if(($(this).val().contains("/level1/level1.html")) || 
              ($(this).val().contains("/level1/level2.html")) ||
              ($(this).val().contains("/level3.html")) ||
              ($(this).val().contains("/loading.html")) ||
              ($(this).val().contains("/level5/level5.html")) ||
              ($(this).val().contains("/levelsix/levelsix.html")) ||
              ($(this).val().contains("/levelsix/goodriddance.html")) ||
              ($(this).val().contains("/levelsix/devilsden.html")) ||
              ($(this).val().contains("/escribeespanol.html")) ||
              ($(this).val().contains("/ochentaysiete.html")) ||
              ($(this).val().contains("/gelo.html")) ||
              ($(this).val().contains("/baaraa.html")) ||
              ($(this).val().contains("/levellostcount/compress.html")) ||
              ($(this).val().contains("/levellostcount/theanswerisalwaysbatman.html")) ||
              ($(this).val().contains("/lev5.html")) ||
              ($(this).val().contains("/levelone6/levelone6.html")) ||
              ($(this).val().contains("/Level17.html")) ||
              ($(this).val().contains("/atharapekhatara.html")) ||
              ($(this).val().contains("/levelunnees/levelunnees.html")) ||
              ($(this).val().contains("/levelunnees/mickeymouse.html")) ||
              ($(this).val().contains("/leveltwo1/leveltwo1.html")) ||
              ($(this).val().contains("/leveltwo1/fox.html")) ||
              ($(this).val().contains("/leveltwo1/martinluther.html")) ||
              ($(this).val().contains("/LeVeLtwentYfOuR/")) ||
              ($(this).val().contains("/hello/")) ||
              ($(this).val().contains("/catwoman/ridiculouslyeasylevel.html")) ||
              ($(this).val().contains("/catwoman/weeknd.html")) ||
              ($(this).val().contains("/catwoman/minusforty.html")) ||
              ($(this).val().contains("/tventy9/")) ||
              ($(this).val().contains("/leveL3o.html")) ||
              ($(this).val().contains("/troisuno/level31.html")) ||
              ($(this).val().contains("/troisuno/black.html")) ||
              ($(this).val().contains("/troisuno/therese.html")) ||
              ($(this).val().contains("/thiiiiiirtyfour/level34.html")) ||
              ($(this).val().contains("/thiiiiiirtyfour/marge.html")) ||
              ($(this).val().contains("/thiiiiiirtyfour/level36.html")) ||
              ($(this).val().contains("/thiiiiiirtyfour/fakeerror.html")) ||
              ($(this).val().contains("/hashtaglevel38/level38.html")) ||
              ($(this).val().contains("/hashtaglevel38/pi.html")) ||
              ($(this).val().contains("/hashtaglevel38/hithere.html")) ||
              ($(this).val().contains("/levellostcount/newfolder/")) ||
              ($(this).val().contains("/levellostcount/surname.html")) ||
              ($(this).val().contains("/lastfolderofthegame/level43.html")) ||
              ($(this).val().contains("/lastfolderofthegame/agentsmith.html")) ||
              ($(this).val().contains("/lastfolderofthegame/unleadedfuel.html")) ||
              ($(this).val().contains("/lastfolderofthegame/mist.html")))
              {
                $(this).removeClass('input-error');
              }
              else
              {
                e.preventDefault();
                $(this).addClass('input-error');
              }
        });
    	
    });
    
    
});
