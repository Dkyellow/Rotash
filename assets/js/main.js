/* ============================================================
   ROTASH POWER PROJECTS — interactions
   Drawer nav · location selector · location SUGGESTION (never a
   redirect) · scroll reveals · project filters · contact market
   switch · enquiry form validation.
   ============================================================ */
(function () {
    'use strict';

    /* ---------- Mobile drawer ---------- */
    var drawer = document.querySelector('[data-drawer]');
    var scrim = document.querySelector('[data-drawer-scrim]');
    var openBtn = document.querySelector('[data-drawer-open]');
    var closeBtn = document.querySelector('[data-drawer-close]');

    function setDrawer(open) {
        if (!drawer) return;
        drawer.hidden = !open;
        if (scrim) scrim.hidden = !open;
        if (openBtn) openBtn.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('menu-open', open);
        if (open) {
            var first = drawer.querySelector('a, button');
            if (first) first.focus();
        } else if (openBtn) {
            openBtn.focus();
        }
    }

    if (openBtn) openBtn.addEventListener('click', function () { setDrawer(true); });
    if (closeBtn) closeBtn.addEventListener('click', function () { setDrawer(false); });
    if (scrim) scrim.addEventListener('click', function () { setDrawer(false); });
    if (drawer) {
        drawer.addEventListener('click', function (e) {
            if (e.target.closest('a')) setDrawer(false);
        });
    }

    /* ---------- Location selector ---------- */
    var locRoot = document.querySelector('[data-loc-selector]');
    if (locRoot) {
        var locToggle = locRoot.querySelector('[data-loc-toggle]');
        var locMenu = locRoot.querySelector('[data-loc-menu]');

        var closeLoc = function () {
            locMenu.hidden = true;
            locToggle.setAttribute('aria-expanded', 'false');
        };
        var openLoc = function () {
            locMenu.hidden = false;
            locToggle.setAttribute('aria-expanded', 'true');
        };

        locToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            if (locMenu.hidden) openLoc(); else closeLoc();
        });
        document.addEventListener('click', function (e) {
            if (!locMenu.hidden && !locRoot.contains(e.target)) closeLoc();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !locMenu.hidden) { closeLoc(); locToggle.focus(); }
        });

        // Remember the user's explicit choice — used only to improve future
        // suggestions, never to redirect them.
        locMenu.addEventListener('click', function (e) {
            var link = e.target.closest('a');
            if (link) {
                try { localStorage.setItem('rpp-market-pref', link.getAttribute('href')); } catch (err) {}
            }
        });
    }

    /* ---------- Location suggestion (optional, dismissible) ---------- */
    var geoBanner = document.querySelector('[data-geo-banner]');
    if (geoBanner) {
        var MARKET_BY_LOCALE = {
            GB: { code: 'uk', name: 'United Kingdom', path: '/uk/' },
            ZA: { code: 'south-africa', name: 'South Africa', path: '/south-africa/' }
        };
        var currentMarket = document.body.getAttribute('data-market') || 'global';

        var dismissed = false;
        var pref = null;
        try {
            dismissed = localStorage.getItem('rpp-geo-dismissed') === '1';
            pref = localStorage.getItem('rpp-market-pref');
        } catch (err) {}

        if (!dismissed && !pref) {
            var locale = (navigator.language || '').toUpperCase();
            var region = locale.split('-')[1];
            var suggested = region ? MARKET_BY_LOCALE[region] : null;

            if (suggested && suggested.code !== currentMarket) {
                var textEl = geoBanner.querySelector('[data-geo-text]');
                if (textEl) {
                    textEl.textContent = 'You may be looking for the ' + suggested.name + ' site.';
                }
                var accept = geoBanner.querySelector('[data-geo-accept]');
                var dismiss = geoBanner.querySelector('[data-geo-dismiss]');

                if (accept) {
                    accept.addEventListener('click', function () {
                        try { localStorage.setItem('rpp-market-pref', suggested.path); } catch (err) {}
                        window.location.href = suggested.path;
                    });
                }
                if (dismiss) {
                    dismiss.addEventListener('click', function () {
                        geoBanner.hidden = true;
                        try { localStorage.setItem('rpp-geo-dismissed', '1'); } catch (err) {}
                    });
                }

                window.setTimeout(function () { geoBanner.hidden = false; }, 1200);
            }
        }
    }

    /* ---------- Scroll reveals ---------- */
    var revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && revealEls.length) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -80px 0px', threshold: 0.08 });
        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }

    /* ---------- Project filters ---------- */
    var filterRoot = document.querySelector('[data-filters]');
    if (filterRoot) {
        var projectList = document.querySelector('[data-project-list]');
        var emptyMsg = document.querySelector('[data-filter-empty]');
        var state = { country: 'all', sector: 'all', service: 'all' };

        var applyFilters = function () {
            if (!projectList) return;
            var visible = 0;
            projectList.querySelectorAll('[data-project]').forEach(function (card) {
                var okCountry = state.country === 'all' || card.getAttribute('data-country') === state.country;
                var okSector = state.sector === 'all' || card.getAttribute('data-sector') === state.sector;
                var services = (card.getAttribute('data-services') || '').split(' ');
                var okService = state.service === 'all' || services.indexOf(state.service) !== -1;
                var show = okCountry && okSector && okService;
                card.classList.toggle('is-hidden', !show);
                if (show) visible++;
            });
            if (emptyMsg) emptyMsg.hidden = visible !== 0;
        };

        filterRoot.addEventListener('click', function (e) {
            var chip = e.target.closest('.chip');
            if (!chip) return;
            var group = chip.getAttribute('data-filter');
            var value = chip.getAttribute('data-value');
            filterRoot.querySelectorAll('.chip[data-filter="' + group + '"]').forEach(function (c) {
                c.classList.toggle('is-active', c === chip);
            });
            state[group] = value;
            applyFilters();
        });
    }

    /* ---------- Contact market switch ---------- */
    var marketSwitch = document.querySelector('[data-market-switch]');
    if (marketSwitch) {
        var panels = document.querySelectorAll('[data-market-panel]');
        var countrySelect = document.querySelector('[data-country-select]');

        var activateMarket = function (code) {
            marketSwitch.querySelectorAll('[data-switch-market]').forEach(function (btn) {
                btn.classList.toggle('is-active', btn.getAttribute('data-switch-market') === code);
            });
            panels.forEach(function (panel) {
                panel.hidden = panel.getAttribute('data-market-panel') !== code;
            });
            if (countrySelect) {
                countrySelect.value = code === 'global' ? 'other' : code;
            }
        };

        marketSwitch.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-switch-market]');
            if (btn) activateMarket(btn.getAttribute('data-switch-market'));
        });

        if (countrySelect) {
            countrySelect.addEventListener('change', function () {
                var code = countrySelect.value === 'other' ? 'global' : countrySelect.value;
                activateMarket(code);
            });
        }
    }

    /* ---------- Enquiry form ---------- */
    var form = document.querySelector('[data-enquiry-form]');
    if (form) {
        var setFieldError = function (input, hasError) {
            var field = input.closest('.field');
            if (field) field.classList.toggle('has-error', hasError);
            if (hasError) input.setAttribute('aria-invalid', 'true');
            else input.removeAttribute('aria-invalid');
        };

        var validate = function () {
            var ok = true;
            form.querySelectorAll('[required]').forEach(function (input) {
                var value = (input.value || '').trim();
                var bad = !value;
                if (!bad && input.type === 'email') {
                    bad = !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value);
                }
                setFieldError(input, bad);
                if (bad) ok = false;
            });
            return ok;
        };

        form.querySelectorAll('[required]').forEach(function (input) {
            input.addEventListener('input', function () {
                if (input.closest('.field') && input.closest('.field').classList.contains('has-error')) {
                    validate();
                }
            });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!validate()) {
                var firstBad = form.querySelector('[aria-invalid="true"]');
                if (firstBad) firstBad.focus();
                return;
            }

            var btn = form.querySelector('[data-submit-btn]');
            var success = form.querySelector('[data-form-success]');
            var original = btn.textContent;
            btn.disabled = true;
            btn.textContent = 'Sending…';

            // TODO(form): replace this simulation with a POST to a PHP handler
            // (mail()/SMTP + honeypot + rate limiting) before launch.
            window.setTimeout(function () {
                btn.disabled = false;
                btn.textContent = original;
                if (success) success.classList.add('is-visible');
                form.reset();
                var country = document.querySelector('[data-country-select]');
                if (country) country.dispatchEvent(new Event('change'));
            }, 900);
        });
    }
})();
