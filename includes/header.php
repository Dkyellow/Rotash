<?php
$activeKey = $page['key'] ?? '';
$code = current_market_code();
$cp = contact_point($code);
?><a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" id="site-header">
    <div class="container site-header__inner">
        <a class="brand" href="<?= e(mp('')) ?>" aria-label="Rotash Power Projects home">
            <img src="/assets/img/logo-mark.png" alt="" width="36" height="36" class="brand__mark">
            <span class="brand__text"><strong>Rotash</strong> <span>Power Projects</span></span>
        </a>
        <nav class="nav" aria-label="Primary">
            <ul class="nav__list">
<?php foreach ($NAV as $item): ?>
                <li class="nav__item"><a class="nav__link<?= $activeKey === $item['key'] ? ' is-active' : '' ?>" href="<?= e(mp($item['path'])) ?>"<?= $activeKey === $item['key'] ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
            </ul>
        </nav>
        <div class="header-markets" aria-label="Operating markets">
            <span class="header-markets__label">Markets</span>
            <a href="/south-africa/"<?= $code === 'south-africa' ? ' aria-current="page"' : '' ?>>SA</a>
            <a href="/uk/"<?= $code === 'uk' ? ' aria-current="page"' : '' ?>>UK</a>
            <a href="/zimbabwe/"<?= $code === 'zimbabwe' ? ' aria-current="page"' : '' ?>>Zim</a>
        </div>
        <div class="site-header__actions">
            <a class="btn btn--primary site-header__cta" href="<?= e(mp('contact/')) ?>">Enquire now <span aria-hidden="true">↗</span></a>
            <button type="button" class="drawer-toggle" aria-expanded="false" aria-controls="site-drawer" data-drawer-open><span class="drawer-toggle__bar"></span><span class="drawer-toggle__bar"></span><span class="drawer-toggle__bar"></span><span class="visually-hidden">Open menu</span></button>
        </div>
    </div>
</header>
<div class="drawer" id="site-drawer" hidden data-drawer>
    <div class="drawer__head"><a class="brand" href="<?= e(mp('')) ?>"><img src="/assets/img/logo-mark.png" alt="" width="34" height="34" class="brand__mark"><span class="brand__text"><strong>Rotash</strong> <span>Power Projects</span></span></a><button type="button" class="drawer__close" data-drawer-close aria-label="Close menu">×</button></div>
    <nav class="drawer__nav" aria-label="Mobile"><ul>
<?php foreach ($NAV as $item): ?><li><a class="drawer__link" href="<?= e(mp($item['path'])) ?>"><?= e($item['label']) ?></a></li><?php endforeach; ?>
    </ul></nav>
    <a class="btn btn--primary btn--block" href="<?= e(mp('contact/')) ?>">Discuss your requirements</a>
    <div class="drawer__contact"><a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a><a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a></div>
</div>
<div class="drawer-scrim" data-drawer-scrim hidden></div>
<main id="main">
