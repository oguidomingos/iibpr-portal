/**
 * IIBPR Theme — script.js
 *
 * Front-end JS: mobile menu, sticky header, carousel, smooth scroll,
 * active nav, animated counters, accordion, course filter, fade-up observer.
 *
 * Processed by esbuild → ../theme/js/script.min.js
 */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Mobile menu ── */
  var toggle = document.querySelector('.mobile-menu-toggle');
  var nav    = document.getElementById('site-navigation');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      // Toggle hamburger/close icons
      var openIcon  = toggle.querySelector('.menu-icon-open');
      var closeIcon = toggle.querySelector('.menu-icon-close');
      if (openIcon && closeIcon) {
        openIcon.classList.toggle('hidden', isOpen);
        closeIcon.classList.toggle('hidden', !isOpen);
      }
    });
    document.addEventListener('click', function (e) {
      if (!toggle.contains(e.target) && !nav.contains(e.target)) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        var openIcon  = toggle.querySelector('.menu-icon-open');
        var closeIcon = toggle.querySelector('.menu-icon-close');
        if (openIcon && closeIcon) {
          openIcon.classList.remove('hidden');
          closeIcon.classList.add('hidden');
        }
      }
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('open')) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.focus();
      }
    });
  }

  /* ── Sticky header shadow ── */
  var header = document.getElementById('masthead');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });
  }

  /* ── Universal Carousel ── */
  document.querySelectorAll('.carousel-wrapper').forEach(function (wrapper) {
    var track   = wrapper.querySelector('.carousel-track');
    var prevBtn = wrapper.querySelector('.carousel-btn-prev');
    var nextBtn = wrapper.querySelector('.carousel-btn-next');
    var dots    = wrapper.querySelectorAll('.carousel-dot');
    var current = 0;
    var total   = wrapper.querySelectorAll('.carousel-slide').length;
    var timer   = null;

    if (!track || total === 0) return;

    // Detect hero carousel for white dot styling
    var isHero = wrapper.closest('.hero-carousel') !== null;

    function goTo(idx) {
      current = (idx + total) % total;
      track.style.transform = 'translateX(-' + (current * (100 / total)) + '%)';
      dots.forEach(function (d, i) {
        if (isHero) {
          d.classList.toggle('bg-white', i === current);
          d.classList.toggle('w-8', i === current);
          d.classList.toggle('bg-white/50', i !== current);
          d.classList.remove(i === current ? 'bg-white/50' : 'bg-white');
          if (i !== current) d.classList.remove('w-8');
        } else {
          d.classList.toggle('bg-iibpr-green', i === current);
          d.classList.toggle('bg-gray-300',    i !== current);
        }
        d.setAttribute('aria-selected', String(i === current));
      });
    }

    if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });
    dots.forEach(function (d, i) { d.addEventListener('click', function () { goTo(i); }); });

    wrapper.setAttribute('tabindex', '0');
    wrapper.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowLeft')  goTo(current - 1);
      if (e.key === 'ArrowRight') goTo(current + 1);
    });

    var touchX = 0;
    wrapper.addEventListener('touchstart', function (e) { touchX = e.changedTouches[0].screenX; }, { passive: true });
    wrapper.addEventListener('touchend',   function (e) {
      var diff = touchX - e.changedTouches[0].screenX;
      if (Math.abs(diff) > 40) goTo(diff > 0 ? current + 1 : current - 1);
    }, { passive: true });

    var interval = wrapper.dataset.autoplay ? parseInt(wrapper.dataset.autoplay) : 0;
    if (interval > 0) {
      function startTimer() { timer = setInterval(function () { goTo(current + 1); }, interval); }
      startTimer();
      wrapper.addEventListener('mouseenter', function () { clearInterval(timer); });
      wrapper.addEventListener('mouseleave', startTimer);
    }
    goTo(0);
  });

  /* ── Smooth scroll ── */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var href = this.getAttribute('href');
      if (href === '#') return;
      var target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        if (nav && toggle) {
          nav.classList.remove('open');
          toggle.setAttribute('aria-expanded', 'false');
        }
      }
    });
  });

  /* ── Active nav on scroll ── */
  var sections = document.querySelectorAll('section[id]');
  var navLinks = document.querySelectorAll('#primary-menu a[href^="#"]');
  if (sections.length && navLinks.length) {
    window.addEventListener('scroll', function () {
      var pos = window.scrollY + 100;
      sections.forEach(function (s) {
        if (s.offsetTop <= pos && s.offsetTop + s.offsetHeight > pos) {
          navLinks.forEach(function (l) { l.classList.toggle('active', l.getAttribute('href') === '#' + s.id); });
        }
      });
    }, { passive: true });
  }

  /* ── Animated counters ── */
  var counters = document.querySelectorAll('.counter-animate');
  if (counters.length && 'IntersectionObserver' in window) {
    var counterObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el  = entry.target;
        var max = parseInt(el.dataset.target, 10);
        var sfx = el.dataset.suffix || '';
        var pfx = el.dataset.prefix || '';
        var n = 0;
        var step = Math.max(1, Math.ceil(max / 88));
        var iv = setInterval(function () {
          n = Math.min(n + step, max);
          el.textContent = pfx + n + sfx;
          if (n >= max) clearInterval(iv);
        }, 16);
        counterObs.unobserve(el);
      });
    }, { threshold: 0.4 });
    counters.forEach(function (c) { counterObs.observe(c); });
  }

  /* ── Accordion ── */
  document.querySelectorAll('.accordion-trigger').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var targetId = this.getAttribute('data-accordion');
      var content  = document.getElementById(targetId);
      var isOpen   = this.getAttribute('aria-expanded') === 'true';

      // Close all siblings in same parent
      var parent = this.closest('.space-y-0, [id$="-accordion"]');
      if (parent) {
        parent.querySelectorAll('.accordion-trigger').forEach(function (t) {
          t.setAttribute('aria-expanded', 'false');
          var c = document.getElementById(t.getAttribute('data-accordion'));
          if (c) c.classList.remove('open');
        });
      }

      // Toggle current
      if (!isOpen && content) {
        this.setAttribute('aria-expanded', 'true');
        content.classList.add('open');
      }
    });
  });

  /* ── Course filter (search + modality buttons) ── */
  var searchInput    = document.getElementById('course-search');
  var filterBtns     = document.querySelectorAll('#modality-filters .filter-btn');
  var coursesGrid    = document.getElementById('courses-grid');
  var noResults      = document.getElementById('no-results');
  var currentFilter  = 'all';

  function filterCourses() {
    if (!coursesGrid) return;
    var searchTerm = (searchInput ? searchInput.value : '').toLowerCase();
    var cards = coursesGrid.querySelectorAll('[data-modality]');
    var visibleCount = 0;

    cards.forEach(function (card) {
      var modality = (card.getAttribute('data-modality') || '').toLowerCase();
      var title    = (card.querySelector('h3') ? card.querySelector('h3').textContent : '').toLowerCase();
      var matchesFilter = currentFilter === 'all' || modality === currentFilter.toLowerCase();
      var matchesSearch = !searchTerm || title.indexOf(searchTerm) !== -1;
      var show = matchesFilter && matchesSearch;

      card.style.display = show ? '' : 'none';
      if (show) visibleCount++;
    });

    if (noResults) {
      noResults.classList.toggle('hidden', visibleCount > 0);
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterCourses);
  }

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      filterBtns.forEach(function (b) { b.classList.remove('filter-btn-active'); });
      this.classList.add('filter-btn-active');
      currentFilter = this.getAttribute('data-filter');
      filterCourses();
    });
  });

  /* ── Fade-up on scroll (IntersectionObserver) ── */
  var fadeEls = document.querySelectorAll('.fade-up');
  if (fadeEls.length && 'IntersectionObserver' in window) {
    var fadeObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          fadeObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    fadeEls.forEach(function (el) { fadeObs.observe(el); });
  }

});
