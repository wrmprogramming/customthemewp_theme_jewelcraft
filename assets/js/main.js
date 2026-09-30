/**
 * JewelCraft - جاوااسکریپت اصلی
 * نسخه ۱.۰.۰
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        /* ============ ۱. هدر چسبان با تغییر در اسکرول ============ */
        const header = document.querySelector('.jc-header');
        if (header) {
            const onScroll = () => {
                if (window.scrollY > 50) {
                    header.classList.add('jc-scrolled');
                } else {
                    header.classList.remove('jc-scrolled');
                }
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        }

        /* ============ ۲. منوی موبایل ============ */
        const toggle = document.querySelector('.jc-menu-toggle');
        const nav = document.querySelector('.jc-nav');

        if (toggle && nav) {
            toggle.addEventListener('click', function () {
                nav.classList.toggle('jc-nav--open');
                toggle.classList.toggle('jc-menu-toggle--active');
                document.body.style.overflow =
                    nav.classList.contains('jc-nav--open') ? 'hidden' : '';
            });

            // بستن با کلیک بیرون
            document.addEventListener('click', function (e) {
                if (
                    nav.classList.contains('jc-nav--open') &&
                    !nav.contains(e.target) &&
                    !toggle.contains(e.target)
                ) {
                    nav.classList.remove('jc-nav--open');
                    toggle.classList.remove('jc-menu-toggle--active');
                    document.body.style.overflow = '';
                }
            });
        }

        /* ============ ۳. انیمیشن ورود با اسکرول ============ */
        const animateEls = document.querySelectorAll('[data-jc-animate]');
        if (animateEls.length && 'IntersectionObserver' in window) {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('jc-animate');
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.15 }
            );
            animateEls.forEach((el) => observer.observe(el));
        }

    });
})();