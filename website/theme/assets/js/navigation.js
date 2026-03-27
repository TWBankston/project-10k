/**
 * Navigation JavaScript
 * TBDesigned Theme
 */

(function() {
    'use strict';

    const navToggle = document.getElementById('nav-toggle');
    const mobileNav = document.getElementById('mobile-navigation');
    const body = document.body;

    if (!navToggle || !mobileNav) return;

    // Toggle mobile menu
    navToggle.addEventListener('click', function() {
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        this.setAttribute('aria-expanded', !isExpanded);
        this.classList.toggle('active');
        mobileNav.classList.toggle('active');
        body.classList.toggle('mobile-menu-open');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInside = mobileNav.contains(event.target) || navToggle.contains(event.target);
        
        if (!isClickInside && mobileNav.classList.contains('active')) {
            navToggle.setAttribute('aria-expanded', 'false');
            navToggle.classList.remove('active');
            mobileNav.classList.remove('active');
            body.classList.remove('mobile-menu-open');
        }
    });

    // Close mobile menu when pressing Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && mobileNav.classList.contains('active')) {
            navToggle.setAttribute('aria-expanded', 'false');
            navToggle.classList.remove('active');
            mobileNav.classList.remove('active');
            body.classList.remove('mobile-menu-open');
        }
    });

    // Close mobile menu on window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth >= 768 && mobileNav.classList.contains('active')) {
                navToggle.setAttribute('aria-expanded', 'false');
                navToggle.classList.remove('active');
                mobileNav.classList.remove('active');
                body.classList.remove('mobile-menu-open');
            }
        }, 250);
    });

    // Trap focus in mobile menu when open
    const focusableElements = mobileNav.querySelectorAll('a, button, input, [tabindex]:not([tabindex="-1"])');
    const firstFocusable = focusableElements[0];
    const lastFocusable = focusableElements[focusableElements.length - 1];

    mobileNav.addEventListener('keydown', function(event) {
        if (event.key !== 'Tab') return;

        if (event.shiftKey) {
            if (document.activeElement === firstFocusable) {
                event.preventDefault();
                lastFocusable.focus();
            }
        } else {
            if (document.activeElement === lastFocusable) {
                event.preventDefault();
                firstFocusable.focus();
            }
        }
    });
})();
