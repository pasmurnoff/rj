$('.header-hamburger').on('click', function(e) {
  $('.path').toggleClass('active');
  $('.home').toggleClass('overflow');
  $('.mobmenu').toggleClass('act');

  e.preventDefault();
});

