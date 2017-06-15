$(document).ready(function() {
  list_hidden = 1;
});
// initialize slick carousel
function initialize_slick() {
  $('.slick-regular-slider').slick({
    dots: true,
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}

// show video list on video pack watch page
function toggle_video_list() {
  if (list_hidden == 1) {
    $('#video-holder').removeClass('col-md-offset-2');
    $('#video-list').show();
  } else {
    $('#video-list').hide();
    $('#video-holder').addClass('col-md-offset-2');
  }
  list_hidden = (list_hidden == 0) ? 1 : 0;
}
