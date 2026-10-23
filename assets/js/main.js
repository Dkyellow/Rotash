/* ============================================================
   ROTASH POWER PROJECTS interactions
   Drawer · services menu · market switch · filters · enquiry
   form · scroll reveals · location suggestion.

   Progressive enhancement: every piece of behaviour below is an
   addition to markup that already works without JavaScript.
   ============================================================ */
(function () {
    'use strict';

    var prefersReduced = window.matchMedia
        && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Mobile drawer ---------- */
    var drawer = document.querySelector('[data-drawer]');
    var scrim = document.querySelector('[data-drawer-scrim]');
    var openBtn = document.querySelector('[data-drawer-open]');
    var closeBtn = document.querySelector('[data-drawer-close]');
    var lastFocus = null;

    function focusableIn(root) {
        return Array.prototype.slice.call(
            root.querySelectorAll('a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])')
        ).filter(function (el) { return el.offsetParent !== null; });
    }

    function setDrawer(open) {
        if (!drawer) return;
        if (open) {
            lastFocus = document.activeElement;
            drawer.hidden = false;
            if (scrim) scrim.hidden = false;
            document.body.classList.add('menu-open');
            if (openBtn) openBtn.setAttribute('aria-expanded', 'true');
            var first = focusableIn(drawer)[0];
            if (first) first.focus();
        } else {
            drawer.hidden = true;
            if (scrim) scrim.hidden = true;
            document.body.classList.remove('menu-open');
            if (openBtn) openBtn.setAttribute('aria-expanded', 'false');
            if (lastFocus && lastFocus.focus) lastFocus.focus();
        }
    }

    if (openBtn) {
        openBtn.addEventListener('click', function () { setDrawer(true); });
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', function () { setDrawer(false); });
    }
    if (scrim) {
        scrim.addEventListener('click', function () { setDrawer(false); });
    }
    if (drawer) {
        drawer.addEventListener('click', function (e) {
            if (e.target.closest('a')) setDrawer(false);
        });
    }
    document.addEventListener('keydown', function (e) {
        if (!drawer || drawer.hidden) return;
        if (e.key === 'Escape') {
            setDrawer(false);
            return;
        }
        if (e.key === 'Tab') {
            var items = focusableIn(drawer);
            if (!items.length) return;
            var first = items[0];
            var last = items[items.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault(); last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault(); first.focus();
            }
        }
    });

    /* ---------- Drawer sub-groups (services) ---------- */
    Array.prototype.forEach.call(document.querySelectorAll('[data-drawer-toggle]'), function (btn) {
        btn.addEventListener('click', function () {
            var group = btn.closest('.drawer__group');
            if (!group) return;
            var open = group.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });

    /* ---------- Services menu ---------- */
    Array.prototype.forEach.call(document.querySelectorAll('[data-nav-toggle]'), function (btn) {
        var item = btn.closest('.nav__item');
        if (!item) return;
        var closeTimer = null;

        function open() {
            window.clearTimeout(closeTimer);
            item.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
        }
        function close() {
            item.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
        }

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            if (item.classList.contains('is-open')) { close(); } else { open(); }
        });
        item.addEventListener('mouseenter', open);
        item.addEventListener('mouseleave', function () {
            closeTimer = window.setTimeout(close, 160);
        });
        item.addEventListener('focusout', function (e) {
            if (!item.contains(e.relatedTarget)) close();
        });
    });
    document.addEventListener('click', function (e) {
        var open = document.querySelector('.nav__item.is-open');
        if (open && !open.contains(e.target)) {
            open.classList.remove('is-open');
            var toggle = open.querySelector('[data-nav-toggle]');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
        }
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            var open = document.querySelector('.nav__item.is-open');
            if (open) {
                var toggle = open.querySelector('[data-nav-toggle]');
                open.classList.remove('is-open');
                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'false');
                    toggle.focus();
                }
            }
        }
    });

    /* ---------- Contact market switch ---------- */
    var marketSwitch = document.querySelector('[data-market-switch]');
    if (marketSwitch) {
        var panels = document.querySelectorAll('[data-market-panel]');
        var countrySelect = document.querySelector('[data-country-select]');

        var activateMarket = function (code) {
            marketSwitch.querySelectorAll('[data-switch-market]').forEach(function (btn) {
                var on = btn.getAttribute('data-switch-market') === code;
                btn.classList.toggle('is-active', on);
                btn.setAttribute('aria-pressed', on ? 'true' : 'false');
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

    /* ---------- Project filters ---------- */
    var filterRoot = document.querySelector('[data-filters]');
    if (filterRoot) {
        var projectList = document.querySelector('[data-project-list]');
        var emptyMsg = document.querySelector('[data-filter-empty]');
        var statusMsg = document.querySelector('[data-filter-status]');
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
            if (statusMsg) {
                statusMsg.textContent = visible === 1
                    ? '1 case study shown'
                    : visible + ' case studies shown';
            }
        };

        filterRoot.addEventListener('click', function (e) {
            var chip = e.target.closest('.chip');
            if (!chip) return;
            var group = chip.getAttribute('data-filter');
            var value = chip.getAttribute('data-value');
            filterRoot.querySelectorAll('.chip[data-filter="' + group + '"]').forEach(function (c) {
                var on = c === chip;
                c.classList.toggle('is-active', on);
                c.setAttribute('aria-pressed', on ? 'true' : 'false');
            });
            state[group] = value;
            applyFilters();
        });

        applyFilters();
    }

    /* ---------- Enquiry form: client-side validation ---------- */
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
            var firstBad = null;
            form.querySelectorAll('[required]').forEach(function (input) {
                if (input.type === 'checkbox') {
                    var unchecked = !input.checked;
                    setFieldError(input, unchecked);
                    if (unchecked) { ok = false; if (!firstBad) firstBad = input; }
                    return;
                }
                var value = (input.value || '').trim();
                var bad = !value;
                if (!bad && input.type === 'email') {
                    bad = !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value);
                }
                if (!bad && input.tagName === 'TEXTAREA') {
                    bad = value.length < 20;
                }
                setFieldError(input, bad);
                if (bad) { ok = false; if (!firstBad) firstBad = input; }
            });
            return { ok: ok, firstBad: firstBad };
        };

        form.querySelectorAll('input, select, textarea').forEach(function (input) {
            input.addEventListener('input', function () {
                var field = input.closest('.field');
                if (field && field.classList.contains('has-error')) validate();
            });
            input.addEventListener('change', function () {
                var field = input.closest('.field');
                if (field && field.classList.contains('has-error')) validate();
            });
        });

        form.addEventListener('submit', function (e) {
            var result = validate();
            if (!result.ok) {
                e.preventDefault();
                if (result.firstBad) result.firstBad.focus();
                return;
            }
            var btn = form.querySelector('[data-submit-btn]');
            if (btn) {
                btn.disabled = true;
                btn.textContent = 'Sending…';
            }
        });
    }

    /* ---------- Scroll reveals ---------- */
    var revealEls = document.querySelectorAll('.reveal');
    if (prefersReduced || !('IntersectionObserver' in window)) {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -60px 0px', threshold: 0.06 });

        /* Anything already on screen is shown straight away. Only
           content further down the page waits for the observer, so a
           slow or failed observer can never hide what the visitor is
           already looking at. */
        var vh = window.innerHeight || 800;
        revealEls.forEach(function (el) {
            if (el.getBoundingClientRect().top < vh * 0.92) {
                el.classList.add('is-visible');
            } else {
                io.observe(el);
            }
        });
    }

    /* ---------- Location suggestion (optional, dismissible) ---------- */
    var geoBanner = document.querySelector('[data-geo-banner]');
    if (geoBanner) {
        var MARKET_BY_REGION = {
            GB: { name: 'United Kingdom', path: '/uk/' },
            ZA: { name: 'South Africa', path: '/south-africa/' },
            ZW: { name: 'Zimbabwe', path: '/zimbabwe/' }
        };
        var currentMarket = document.body.getAttribute('data-market') || 'global';

        var dismissed = false;
        var pref = null;
        try {
            dismissed = localStorage.getItem('rpp-geo-dismissed') === '1';
            pref = localStorage.getItem('rpp-market-pref');
        } catch (err) { /* storage unavailable */ }

        if (!dismissed && !pref) {
            var locale = (navigator.language || '').toUpperCase();
            var region = locale.split('-')[1];
            var suggested = region ? MARKET_BY_REGION[region] : null;

            if (suggested && suggested.path !== '/' + currentMarket + '/') {
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

                window.setTimeout(function () { geoBanner.hidden = false; }, 1500);
            }
        }
    }
})();
