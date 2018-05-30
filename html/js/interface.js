( function($) {
  'use strict';
$(function(e) {
	
 /*------------------------------------------------------------------
	Countdown
	-------------------------------------------------------------------*/
  // 2018[year] - 4[month] - 22[day]
  
  $('#countdown').countdown('2018/6/22', function(event) { 
	$(this).html(event.strftime('<span class="countdown-period">%-D <span>Day%!D</span></span> <span class="countdown-period">%H <span>Hours</span></span> <span class="countdown-period">%M <span>Minutes</span></span> <span class="countdown-period">%S <span>Seconds</span></span>'));
  });
  

});


})(jQuery);