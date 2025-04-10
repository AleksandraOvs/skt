
const swiperNews = new Swiper('.news-slider', {
  slidesPerView: 1.5, // this
  loop: true,
  spaceBetween: 0,
  watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.slider__button-next',
    prevEl: '.slider__button-prev',
    lockClass: '.hide'
  },
  pagination: {
    el: '.slider-news-pagination',
    type: 'bullets',
  },
  breakpoints: {
    992:{
      slidesPerView: 3,
      grabCursor: false,
      spaceBetween: 30,
    },
    480:{
      slidesPerView: 1.6,
      spaceBetween: 0,
    },
    375:{
      slidesPerView: 1.2,
      spaceBetween: 0,
    }
   
  }
});

const swiperEvents = new Swiper('.events-slider', {
  slidesPerView: 1.5, // this
  loop: true,
  spaceBetween: 30,
  watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.slider__button-next',
    prevEl: '.slider__button-prev',
    lockClass: '.hide'
  },
  pagination: {
    el: '.slider-news-pagination',
    type: 'bullets',
  },
  breakpoints: {
    992:{
      slidesPerView: 3,
      grabCursor: false,
    },
    375:{
      slidesPerView: 3,
    }
  }
});

const swiperReports = new Swiper('.reports-slider', {
  slidesPerView: 1.5, // this
  loop: true,
  spaceBetween: 30,
  watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.slider__button-next',
    prevEl: '.slider__button-prev',
    lockClass: '.hide'
  },
  pagination: {
    el: '.slider-news-pagination',
    type: 'bullets',
  },
  breakpoints: {
    992:{
      slidesPerView: 3,
      grabCursor: false,
    },
    375:{
      slidesPerView: 3,
    }
  }
});

const swiperPartners = new Swiper('.partners-slider', {
  slidesPerView: 1.5, // this
  loop: true,
  spaceBetween: 0,
  watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.slider__button-next',
    prevEl: '.slider__button-prev',
    lockClass: 'hide'
  },
  pagination: {
    el: '.slider-partners-pagination',
    type: 'bullets',
  },
  breakpoints: {
    // 992: {
    //   slidesPerView: 1,
    // },
    // 480:{
    //   slidesPerView: 3,
    // },
    1024:{
      slidesPerView: 5,
    },
    768:{
      slidesPerView: 3,
      spaceBetween: 30,
    },
  }
});

const swiperLinks = new Swiper('.links-slider', {
  slidesPerView: 1, // this
  loop: false,
  spaceBetween: 60,
  watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.slider__button-next',
    prevEl: '.slider__button-prev',
    lockClass: 'hide'
  },
  pagination: {
    el: '.slider-news-pagination',
    type: 'bullets',
  },
  breakpoints: {
    576:{
      slidesPerView: 2,
      grabCursor: false,
    }
  }
  //   375:{
  //     slidesPerView: 3,
  //   }
  // }
});

const swiperTeam = new Swiper('.team-slider', {
  slidesPerView: 1, // this
  loop: true,
  spaceBetween: 60,
  watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.slider__button-next',
    prevEl: '.slider__button-prev',
    lockClass: 'hide'
  },
  pagination: {
    el: '.slider-partners-pagination',
    type: 'bullets',
  },
  breakpoints: {
    992:{
      slidesPerView: 3,
    },
    576:{
      slidesPerView: 2,
      grabCursor: false,
    },
  //   375:{
  //     slidesPerView: 3,
  //   }
  }
});