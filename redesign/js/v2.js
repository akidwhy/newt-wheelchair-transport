(function () {
  'use strict';

  document.querySelectorAll('.v2-burger').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var nav = document.querySelector('.v2-nav');
      if (nav) nav.classList.toggle('v2-open');
    });
  });

  document.querySelectorAll('.v2-faq-q').forEach(function (q) {
    q.addEventListener('click', function () {
      var item = q.closest('.v2-faq-item');
      if (!item) return;
      var open = item.classList.contains('v2-open');
      document.querySelectorAll('.v2-faq-item').forEach(function (el) {
        el.classList.remove('v2-open');
      });
      if (!open) item.classList.add('v2-open');
    });
  });

  if (!('IntersectionObserver' in window)) {
    document.querySelectorAll('.v2-reveal').forEach(function (el) {
      el.classList.add('v2-in');
    });
    return;
  }

  var io = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('v2-in');
          io.unobserve(e.target);
        }
      });
    },
    { rootMargin: '0px 0px -8% 0px', threshold: 0.08 }
  );

  document.querySelectorAll('.v2-reveal').forEach(function (el) {
    io.observe(el);
  });
})();
