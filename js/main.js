/* =============================================
   N.E.W.T. — Non-Emergency Wheelchair Transport
   Main JavaScript
   ============================================= */

document.addEventListener('DOMContentLoaded', () => {

  /* ---- Mobile Nav ---- */
  const hamburger = document.querySelector('.hamburger');
  const mobileMenu = document.querySelector('.mobile-menu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('open');
      mobileMenu.classList.toggle('open');
    });

    // Close on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('open');
        mobileMenu.classList.remove('open');
      });
    });
  }

  /* ---- Active Nav Link ---- */
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(link => {
    const linkPage = link.getAttribute('href');
    if (linkPage === currentPage || (currentPage === '' && linkPage === 'index.html')) {
      link.classList.add('active');
    }
  });

  /* ---- Scroll Animations ---- */
  const fadeEls = document.querySelectorAll('.fade-up');
  if (fadeEls.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('visible'), i * 80);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    fadeEls.forEach(el => observer.observe(el));
  }

  /* ---- FAQ Accordion ---- */
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const btn = item.querySelector('.faq-question');
    if (btn) {
      btn.addEventListener('click', () => {
        const isOpen = item.classList.contains('open');
        faqItems.forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
      });
    }
  });

  /* ---- FAQ Category Filter ---- */
  const catBtns = document.querySelectorAll('.faq-cat-btn');
  catBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      catBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const cat = btn.dataset.cat;
      faqItems.forEach(item => {
        if (cat === 'all' || item.dataset.cat === cat) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  /* ---- Populate DOB Year dropdown ---- */
  const dobYear = document.getElementById('dob-year-select');
  if (dobYear) {
    const currentYear = new Date().getFullYear();
    for (let y = currentYear; y >= 1900; y--) {
      const opt = document.createElement('option');
      opt.value = y;
      opt.textContent = y;
      dobYear.appendChild(opt);
    }
  }

  /* ---- Netlify Form: build subject line from actual field values ---- */
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', () => {
      const first   = (document.getElementById('pax-first')?.value   || '').trim();
      const last    = (document.getElementById('pax-last')?.value    || '').trim();
      const date    = (document.getElementById('trip-date')?.value   || '').trim();
      const subject = document.getElementById('form-subject');
      if (subject) {
        const name    = [first, last].filter(Boolean).join(' ') || 'Unknown Passenger';
        const dateStr = date ? new Date(date + 'T00:00:00').toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) : 'Date TBD';
        subject.value = `Ride Request: ${name} on ${dateStr}`;
      }
    });
  }

  /* ---- Netlify Form: show success banner after redirect ---- */
  const successBanner = document.getElementById('form-success');
  if (successBanner && new URLSearchParams(window.location.search).get('sent') === '1') {
    successBanner.classList.add('show');
    successBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
    // Clean the URL without reloading
    history.replaceState(null, '', window.location.pathname);
  }

  /* ---- Smooth counter animation (stats) ---- */
  const stats = document.querySelectorAll('[data-count]');
  if (stats.length) {
    const countObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const target = parseInt(el.dataset.count, 10);
          const suffix = el.dataset.suffix || '';
          const duration = 1500;
          const step = Math.ceil(target / (duration / 16));
          let current = 0;
          const timer = setInterval(() => {
            current += step;
            if (current >= target) {
              current = target;
              clearInterval(timer);
            }
            el.textContent = current.toLocaleString() + suffix;
          }, 16);
          countObserver.unobserve(el);
        }
      });
    }, { threshold: 0.5 });
    stats.forEach(el => countObserver.observe(el));
  }

});
