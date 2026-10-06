<?php
/** Site header: primary nav, location selector, consultation CTA, mobile drawer. */
$activeKey = $page['key'] ?? '';
$m         = market(current_market_code());
$offices   = $OFFICES[current_market_code()];
?><a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" id="site-header">
    <div class="container site-header__inner">
        <a class="brand" href="<?= e(mp('')) ?>" aria-label="<?= e(SITE_NAME) ?> — home">
            <img src="/assets/img/logo.png" alt="" width="40" height="40" class="brand__mark">
            <span class="brand__text"><strong>Rotash</strong> Power Projects</span>
        </a>

        <nav class="nav" aria-label="Primary">
            <ul class="nav__list">
<?php foreach ($NAV as $item): ?>
                <li><a class="nav__link<?= $activeKey === $item['key'] ? ' is-active' : '' ?>"
                      href="<?= e(mp($item['path'])) ?>"><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
            </ul>
        </nav>

        <div class="site-header__actions">
            <div class="loc" data-loc-selector>
                <button type="button" class="loc__btn" aria-haspopup="listbox" aria-expanded="false" data-loc-toggle>
                    <svg class="loc__globe" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true"><circle cx="8" cy="8" r="6.25" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M1.75 8h12.5M8 1.75c-4 3.9-4 8.6 0 12.5 4-3.9 4-8.6 0-12.5z" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                    <span class="loc__stack">
                        <span class="loc__label">Location</span>
                        <span class="loc__value"><?= e($m['name']) ?></span>
                    </span>
                    <svg class="loc__caret" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true"><path d="M2 3.5 5 6.5 8 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                </button>
                <ul class="loc__menu" role="listbox" aria-label="Choose location" data-loc-menu hidden>
<?php foreach ($MARKETS as $code => $mk): ?>
                    <li role="option" aria-selected="<?= $code === $m['code'] ? 'true' : 'false' ?>">
                        <a class="loc__option<?= $code === $m['code'] ? ' is-current' : '' ?>"
                           href="<?= e($mk['prefix'] ?: '/') ?>">
                            <span class="loc__option-name"><?= e($mk['code'] === 'global' ? 'All Markets' : $mk['name']) ?></span>
                            <span class="loc__option-meta"><?= e($mk['code'] === 'global' ? 'International' : $mk['hreflang']) ?></span>
                        </a>
                    </li>
<?php endforeach; ?>
                </ul>
            </div>

            <a class="btn btn--primary site-header__cta" href="<?= e(mp('contact/')) ?>">Request a Consultation</a>

            <button type="button" class="drawer-toggle" aria-expanded="false" aria-controls="site-drawer" data-drawer-open>
                <span class="drawer-toggle__bar"></span>
                <span class="drawer-toggle__bar"></span>
                <span class="drawer-toggle__bar"></span>
                <span class="visually-hidden">Menu</span>
            </button>
        </div>
    </div>
</header>

<div class="drawer" id="site-drawer" hidden data-drawer>
    <div class="drawer__head">
        <a class="brand" href="<?= e(mp('')) ?>">
            <img src="/assets/img/logo.png" alt="" width="36" height="36" class="brand__mark">
            <span class="brand__text"><strong>Rotash</strong> Power Projects</span>
        </a>
        <button type="button" class="drawer__close" data-drawer-close aria-label="Close menu">
            <svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true"><path d="M4 4l12 12M16 4L4 16" stroke="currentColor" stroke-width="1.75"/></svg>
        </button>
    </div>
    <nav class="drawer__nav" aria-label="Mobile">
        <ul>
<?php foreach ($NAV as $item): ?>
            <li><a class="drawer__link<?= $activeKey === $item['key'] ? ' is-active' : '' ?>" href="<?= e(mp($item['path'])) ?>"><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
        </ul>
    </nav>
    <div class="drawer__section">
        <p class="drawer__label">Location</p>
        <ul class="drawer__markets">
<?php foreach ($MARKETS as $code => $mk): ?>
            <li>
                <a class="drawer__market<?= $code === $m['code'] ? ' is-current' : '' ?>" href="<?= e($mk['prefix'] ?: '/') ?>">
                    <?= e($code === 'global' ? 'All Markets' : $mk['name']) ?>
                </a>
            </li>
<?php endforeach; ?>
        </ul>
    </div>
    <a class="btn btn--primary btn--block" href="<?= e(mp('contact/')) ?>">Request a Consultation</a>
    <div class="drawer__contact">
        <a href="tel:<?= e(preg_replace('/\s+/', '', $offices['phone'])) ?>"><?= e($offices['phone']) ?></a>
        <a href="mailto:<?= e($offices['email']) ?>"><?= e($offices['email']) ?></a>
    </div>
</div>
<div class="drawer-scrim" data-drawer-scrim hidden></div>

<!-- Geolocation SUGGESTION only — never a redirect. User choice always wins. -->
<div class="geo-banner" id="geo-banner" hidden data-geo-banner>
    <p data-geo-text>Looking for your local Rotash team?</p>
    <div class="geo-banner__actions">
        <button type="button" class="btn btn--primary btn--sm" data-geo-accept>Switch location</button>
        <button type="button" class="btn btn--ghost btn--sm" data-geo-dismiss>Stay on this site</button>
    </div>
</div>

<main id="main">
