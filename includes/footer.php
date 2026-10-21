</main>

<?php
$code = current_market_code();
$m    = market($code);
$cp   = contact_point($code);
?>
<footer class="site-footer">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__brand">
                <a class="brand brand--footer" href="<?= e(mp('')) ?>">
                    <img src="/assets/img/logo-mark-white.png" alt="" width="38" height="38" class="brand__mark">
                    <span class="brand__text"><strong>Rotash</strong> Power Projects</span>
                </a>
                <p class="footer__tagline"><?= e(TAGLINE) ?></p>
                <p class="footer__group">A <?= e(PARENT_GROUP) ?> company — refrigeration and air-conditioning engineering across three countries.</p>
            </div>

            <div class="footer__col">
                <h2 class="footer__heading">Company</h2>
                <ul class="footer__links">
                    <li><a href="<?= e(mp('about/')) ?>">About us</a></li>
                    <li><a href="<?= e(mp('services/')) ?>">Services</a></li>
                    <li><a href="<?= e(mp('industries/')) ?>">Sectors</a></li>
                    <li><a href="<?= e(mp('projects/')) ?>">Projects</a></li>
                    <li><a href="<?= e(mp('locations/')) ?>">Locations</a></li>
                    <li><a href="<?= e(mp('contact/')) ?>">Contact</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__heading">Disciplines</h2>
                <ul class="footer__links">
<?php foreach (services_for_market($code) as $sid => $s): ?>
                    <li><a href="<?= e(mp('services/')) ?>#<?= e($sid) ?>"><?= e($s['nav']) ?></a></li>
<?php endforeach; ?>
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__heading">Markets</h2>
                <ul class="footer__links">
                    <li><a href="/">International</a></li>
<?php foreach ($MARKETS as $mcode => $mk): if ($mcode === 'global') continue; ?>
                    <li><a href="<?= e($mk['prefix']) ?>"><?= e($mk['name']) ?></a></li>
<?php endforeach; ?>
                </ul>
            </div>

            <div class="footer__col footer__col--contact">
                <h2 class="footer__heading"><?= e($m['name']) ?></h2>
                <ul class="footer__contact">
                    <li><a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a></li>
                    <li><a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a></li>
<?php if ($cp['hours'] !== ''): ?>
                    <li class="footer__contact-note"><?= e($cp['hours']) ?></li>
<?php endif; ?>
<?php foreach ($cp['offices'] as $loc): ?>
                    <li class="footer__contact-note"><?= e($loc['address']) ?></li>
<?php endforeach; ?>
<?php if ($cp['pending']): ?>
                    <li class="footer__contact-note">Local details for this market are being confirmed — group enquiries are handled centrally in the meantime.</li>
<?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved. A <?= e(PARENT_GROUP) ?> company.</p>
            <p class="footer__bottom-note">rotashpowerprojects.com</p>
            <p class="footer__bottom-credit">Developed by <a href="https://lesliesarai.co.zw" rel="noopener">Leslie Sarai</a></p>
        </div>
    </div>
</footer>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
