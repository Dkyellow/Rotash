<?php
/**
 * Site header: utility bar, primary nav with a services menu, market
 * selector, consultation CTA and the mobile drawer.
 */
$activeKey = $page['key'] ?? '';
$code      = current_market_code();
$m         = market($code);
$cp        = contact_point($code);
$disciplines = services_for_market($code);
?><a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="site-header">
    <div class="utility-bar">
        <div class="container utility-bar__inner">
            <p class="utility-bar__note">
                <span class="utility-bar__label">Group enquiries</span>
                <a href="tel:<?= e(tel_href(GROUP_CONTACT['phone'])) ?>"><?= e(GROUP_CONTACT['phone']) ?></a>
                <span class="utility-bar__sep" aria-hidden="true">·</span>
                <a href="mailto:<?= e(GROUP_CONTACT['email']) ?>"><?= e(GROUP_CONTACT['email']) ?></a>
            </p>
            <div class="market-switch market-switch--bar" data-market-switch>
                <span class="utility-bar__label" id="market-bar-label">Market</span>
                <div class="market-switch__row" role="group" aria-labelledby="market-bar-label">
<?php foreach ($MARKETS as $mcode => $mk): if ($mcode === 'global') continue; ?>
                    <a class="market-chip<?= $mcode === $code ? ' is-current' : '' ?>" href="<?= e($mk['prefix']) ?>"
                       <?= $mcode === $code ? 'aria-current="true"' : '' ?>><?= e($mk['short']) ?></a>
<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container site-header__inner">
        <a class="brand" href="<?= e(mp('')) ?>" aria-label="<?= e(SITE_NAME) ?> — home">
            <img src="/assets/img/logo-mark.png" alt="" width="38" height="38" class="brand__mark">
            <span class="brand__text"><strong>Rotash</strong> Power Projects</span>
        </a>

        <nav class="nav" aria-label="Primary">
            <ul class="nav__list">
<?php foreach ($NAV as $item): ?>
<?php if ($item['key'] === 'services'): ?>
                <li class="nav__item nav__item--menu">
                    <button type="button" class="nav__link nav__toggle<?= $activeKey === 'services' ? ' is-active' : '' ?>"
                            aria-expanded="false" aria-controls="nav-menu-services" data-nav-toggle>
                        <?= e($item['label']) ?>
                        <svg class="nav__caret" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true"><path d="M2 3.5 5 6.5 8 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                    </button>
                    <div class="nav__menu" id="nav-menu-services">
                        <p class="nav__menu-label">Disciplines</p>
                        <ul class="nav__menu-list">
<?php foreach ($disciplines as $sid => $s): ?>
                            <li>
                                <a class="nav__menu-link<?= $s['kind'] === 'specialist' ? ' is-specialist' : '' ?>" href="<?= e(mp('services/')) ?>#<?= e($sid) ?>">
                                    <span class="nav__menu-icon"><?= icon($s['icon'] ?? 'ruler') ?></span>
                                    <span class="nav__menu-text">
                                        <span class="nav__menu-name"><?= e($s['nav']) ?></span>
                                        <span class="nav__menu-note"><?= e($s['summary']) ?></span>
                                    </span>
                                </a>
                            </li>
<?php endforeach; ?>
                        </ul>
                        <a class="nav__menu-all" href="<?= e(mp('services/')) ?>">All services and capabilities <svg width="14" height="14" viewBox="0 0 14 14" aria-hidden="true"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
                    </div>
                </li>
<?php else: ?>
                <li class="nav__item"><a class="nav__link<?= $activeKey === $item['key'] ? ' is-active' : '' ?>"
                       href="<?= e(mp($item['path'])) ?>"<?= $activeKey === $item['key'] ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
            </ul>
        </nav>

        <div class="site-header__actions">
            <a class="btn btn--primary site-header__cta" href="<?= e(mp('contact/')) ?>">Request a consultation</a>
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
            <img src="/assets/img/logo-mark.png" alt="" width="34" height="34" class="brand__mark">
            <span class="brand__text"><strong>Rotash</strong> Power Projects</span>
        </a>
        <button type="button" class="drawer__close" data-drawer-close aria-label="Close menu">
            <svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true"><path d="M4 4l12 12M16 4L4 16" stroke="currentColor" stroke-width="1.75"/></svg>
        </button>
    </div>

    <nav class="drawer__nav" aria-label="Mobile">
        <ul>
<?php foreach ($NAV as $item): ?>
<?php if ($item['key'] === 'services'): ?>
            <li class="drawer__group">
                <button type="button" class="drawer__link drawer__toggle" aria-expanded="false" data-drawer-toggle>
                    <?= e($item['label']) ?>
                    <svg class="nav__caret" width="12" height="12" viewBox="0 0 10 10" aria-hidden="true"><path d="M2 3.5 5 6.5 8 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                </button>
                <ul class="drawer__sub" data-drawer-sub>
<?php foreach ($disciplines as $sid => $s): ?>
                    <li><a class="drawer__sublink" href="<?= e(mp('services/')) ?>#<?= e($sid) ?>"><?= e($s['nav']) ?></a></li>
<?php endforeach; ?>
                </ul>
            </li>
<?php else: ?>
            <li><a class="drawer__link<?= $activeKey === $item['key'] ? ' is-active' : '' ?>" href="<?= e(mp($item['path'])) ?>"><?= e($item['label']) ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
        </ul>
    </nav>

    <div class="drawer__section">
        <p class="drawer__label">Market</p>
        <ul class="drawer__markets">
            <li><a class="drawer__market<?= $code === 'global' ? ' is-current' : '' ?>" href="/">International</a></li>
<?php foreach ($MARKETS as $mcode => $mk): if ($mcode === 'global') continue; ?>
            <li><a class="drawer__market<?= $mcode === $code ? ' is-current' : '' ?>" href="<?= e($mk['prefix']) ?>"><?= e($mk['name']) ?></a></li>
<?php endforeach; ?>
        </ul>
    </div>

    <a class="btn btn--primary btn--block" href="<?= e(mp('contact/')) ?>">Request a consultation</a>

    <div class="drawer__contact">
        <a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a>
        <a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a>
        <?php if ($cp['hours'] !== ''): ?>
        <p class="drawer__hours"><?= e($cp['hours']) ?></p>
        <?php endif; ?>
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
