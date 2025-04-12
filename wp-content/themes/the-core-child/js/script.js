document.addEventListener('DOMContentLoaded', function () {
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

  document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', function () {
      this.classList.toggle('active');
      let content = this.nextElementSibling;
      content.style.display = (content.style.display === 'block') ? 'none' : 'block';
    });
  });

  const text = document.getElementById('textBlock');
  const button = document.getElementById('toggleBtn');

  function handleResize() {
    if (window.innerWidth <= 576) {
      text.classList.add('clamped');
      button.style.display = 'block';
      button.textContent = 'Читать полностью...';
    } else {
      text.classList.remove('clamped');
      button.style.display = 'none';
    }
  }

  button.addEventListener('click', () => {
    const isClamped = text.classList.contains('clamped');
    text.classList.toggle('clamped');
    button.textContent = isClamped ? 'Скрыть' : 'Читать полностью...';
  });

  window.addEventListener('load', handleResize);
  window.addEventListener('resize', handleResize);


  /**Показать блок Критерии */

  const buttons = document.querySelectorAll('.show-criteria');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const nextElem = button.nextElementSibling;
      if (nextElem && nextElem.classList.contains('criteria-list')) {
        nextElem.classList.add('highlight');
      }
      button.style.display = 'none';
    });
  });
});

