/* Jay Infoservices — script.js */

(function () {
  'use strict';

  // --- ELEMENTS ---
  const header       = document.getElementById('siteHeader');
  const progressFill = document.getElementById('progressFill');
  const navToggle    = document.getElementById('navToggle');
  const navLinks     = document.getElementById('navLinks');
  const navLinkItems = document.querySelectorAll('.nav-link');
  const yearEl       = document.getElementById('year');

  // --- YEAR ---
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // --- STATE ---
  let lastScrollY   = 0;
  let menuOpen      = false;
  const SCROLL_THRESHOLD = 40;
  const MOBILE_BP        = 860;

  // --- SCROLL HANDLER ---
  function onScroll() {
    const scrollY = window.scrollY;
    const docH    = document.documentElement.scrollHeight - window.innerHeight;

    // Progress bar
    progressFill.style.width = docH > 0 ? (scrollY / docH * 100) + '%' : '0%';

    // Frosted / solid nav on scroll
    if (scrollY > SCROLL_THRESHOLD) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }

    // Hide/show nav on scroll direction (mobile only, not when menu open)
    if (window.innerWidth <= MOBILE_BP && !menuOpen) {
      if (scrollY > lastScrollY && scrollY > 100) {
        header.classList.add('is-hidden');
      } else {
        header.classList.remove('is-hidden');
      }
    }

    lastScrollY = scrollY;
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll(); // run on load

  // --- HAMBURGER ---
  navToggle.addEventListener('click', function () {
    menuOpen = !menuOpen;
    navLinks.classList.toggle('is-open', menuOpen);
    navToggle.setAttribute('aria-expanded', menuOpen);
    header.classList.remove('is-hidden');
  });

  // Close menu when a link is clicked
  navLinkItems.forEach(function (link) {
    link.addEventListener('click', function () {
      menuOpen = false;
      navLinks.classList.remove('is-open');
      navToggle.setAttribute('aria-expanded', false);
    });
  });

  // --- SCROLLSPY ---
  const sections = document.querySelectorAll('section[id]');
  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        navLinkItems.forEach(function (link) {
          link.classList.toggle(
            'is-active',
            link.getAttribute('href') === '#' + entry.target.id
          );
        });
      }
    });
  }, { rootMargin: '-45% 0px -50% 0px' });

  sections.forEach(function (section) { observer.observe(section); });

})();
