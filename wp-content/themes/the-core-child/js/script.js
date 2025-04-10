//anim numbers


if ($('.section-nums').length) {
    let isAnim = 0;
    scrollTracking();
    function scrollTracking() {
      let wt = $(window).scrollTop();
      let wh = $(window).height();
      let et = $('.section-nums').offset().top + 50;
      let eh = $('.section-nums').outerHeight();
      let dh = $(document).height();
      if (wt + wh >= et || wh + wt == dh || eh + et < wh) {
        isAnim = 1;
        $('.js-anim-numbers').addClass('_show')
        $('.js-anim-numbers').delay(800).spincrement({
          thousandSeparator: "",
          duration: 3500
        });
      }
    };
    $(window).scroll(function () {
      if (!isAnim) {
        scrollTracking();
      }
    });
  }

