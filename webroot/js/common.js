$(document).ready(function() {
  // fade out flash 'success' messages
  $('#flash_success').addClass('animated fadeIn');
    $( ".close" ).click(function() {
        jQuery('#flash_success').removeClass('fadeIn');
        jQuery('#flash_success').addClass('fadeOut');
    });
    // fade out flash 'error' messages
    $('#flash_error').addClass('animated fadeIn');
        $('.close').click(function() {
	        jQuery('#flash_error').removeClass('fadeIn');
	        jQuery('#flash_error').addClass('fadeOut');
        });
});