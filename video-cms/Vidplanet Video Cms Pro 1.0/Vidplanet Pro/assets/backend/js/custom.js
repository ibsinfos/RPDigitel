// page preloader
jQuery(document).ready(function($) {
  $(window).load(function() {
    $('.page_preloader').fadeOut('slow', function() {
      $(this).remove();
    });
  });
});
