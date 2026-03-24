(function () {
  'use strict';

  /* ---- Sticky nav morph ---- */
  var top = document.querySelector('.v3-top');
  function onScroll() {
    if (!top) return;
    if (window.scrollY > 48) top.classList.add('v3-scrolled');
    else top.classList.remove('v3-scrolled');
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---- Mobile nav ---- */
  document.querySelectorAll('.v3-burger').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var nav = document.querySelector('.v3-nav');
      if (nav) nav.classList.toggle('v3-open');
    });
  });

  /* ---- FAQ accordion ---- */
  document.querySelectorAll('.v3-faq-q').forEach(function (q) {
    q.addEventListener('click', function () {
      var item = q.closest('.v3-faq-item');
      if (!item) return;
      var open = item.classList.contains('v3-open');
      document.querySelectorAll('.v3-faq-item').forEach(function (el) {
        el.classList.remove('v3-open');
      });
      if (!open) item.classList.add('v3-open');
    });
  });

  /* ---- Reveal on scroll ---- */
  var revealEls = document.querySelectorAll('.v3-reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    var rev = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('v3-in');
            rev.unobserve(e.target);
          }
        });
      },
      { rootMargin: '0px 0px -10% 0px', threshold: 0.08 }
    );
    revealEls.forEach(function (el) {
      rev.observe(el);
    });
  } else {
    revealEls.forEach(function (el) {
      el.classList.add('v3-in');
    });
  }

  /* ---- Animated stat counters ---- */
  function animateValue(el, target, suffix, duration) {
    var start = 0;
    var startTime = null;
    function step(t) {
      if (!startTime) startTime = t;
      var p = Math.min((t - startTime) / duration, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      var cur = Math.floor(eased * target);
      el.textContent = cur.toLocaleString() + suffix;
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  var statEls = document.querySelectorAll('[data-v3-count]');
  if (statEls.length && 'IntersectionObserver' in window) {
    var statObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          var el = entry.target;
          var raw = el.getAttribute('data-v3-count');
          var suffix = el.getAttribute('data-v3-suffix') || '';
          var target = parseInt(raw, 10);
          if (!isNaN(target)) animateValue(el, target, suffix, 1600);
          statObs.unobserve(el);
        });
      },
      { threshold: 0.4 }
    );
    statEls.forEach(function (el) {
      statObs.observe(el);
    });
  }

  /* ---- Parallax layers (hero visual) ---- */
  var parallax = document.querySelectorAll('.v3-parallax');
  if (parallax.length) {
    window.addEventListener(
      'scroll',
      function () {
        var y = window.scrollY;
        parallax.forEach(function (el) {
          var speed = parseFloat(el.getAttribute('data-speed')) || 0.15;
          el.style.transform = 'translateY(' + y * speed + 'px)';
        });
      },
      { passive: true }
    );
  }

  /* ---- Horizontal scroll: wheel maps to horizontal when over strip ---- */
  var hscroll = document.querySelector('.v3-hscroll');
  if (hscroll) {
    hscroll.addEventListener(
      'wheel',
      function (e) {
        if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
          var atStart = hscroll.scrollLeft <= 0;
          var atEnd = hscroll.scrollLeft + hscroll.clientWidth >= hscroll.scrollWidth - 2;
          if ((e.deltaY < 0 && atStart) || (e.deltaY > 0 && atEnd)) return;
          e.preventDefault();
          hscroll.scrollLeft += e.deltaY;
        }
      },
      { passive: false }
    );
  }
})();
