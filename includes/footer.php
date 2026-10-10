</main>

<?php $offices = $offices ?? $OFFICES[current_market_code()]; ?>
<footer class="site-footer">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__brand">
                <a class="brand brand--footer" href="<?= e(mp('')) ?>">
                    <img src="/assets/img/logo.png" alt="" width="40" height="40" class="brand__mark">
                    <span class="brand__text"><strong>Rotash</strong> Power Projects</span>
                </a>
                <p class="footer__tagline"><?= e(TAGLINE) ?></p>
                <p class="footer__group">A <?= e(PARENT_GROUP) ?> company — engineering environments across international markets.</p>
            </div>

            <div class="footer__col">
                <h2 class="footer__heading">Company</h2>
                <ul class="footer__links">
                    <li><a href="<?= e(mp('about/')) ?>">About</a></li>
                    <li><a href="<?= e(mp('services/')) ?>">Services</a></li>
                    <li><a href="<?= e(mp('industries/')) ?>">Industries</a></li>
                    <li><a href="<?= e(mp('projects/')) ?>">Projects</a></li>
                    <li><a href="<?= e(mp('insights/')) ?>">Insights</a></li>
                    <li><a href="<?= e(mp('contact/')) ?>">Contact</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__heading">Markets</h2>
                <ul class="footer__links">
<?php foreach ($MARKETS as $code => $mk): ?>
                    <li><a href="<?= e($mk['prefix'] ?: '/') ?>"><?= e($code === 'global' ? 'International' : $mk['name']) ?></a></li>
<?php endforeach; ?>
                    <li><a href="<?= e(mp('locations/')) ?>">All office locations</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__heading"><?= e(market(current_market_code())['name']) ?></h2>
                <ul class="footer__contact">
                    <li><a href="tel:<?= e(preg_replace('/\s+/', '', $offices['phone'])) ?>"><?= e($offices['phone']) ?></a></li>
                    <li><a href="mailto:<?= e($offices['email']) ?>"><?= e($offices['email']) ?></a></li>
                    <li><?= e($offices['hours_label']) ?></li>
<?php foreach ($offices['locations'] as $loc): ?>
                    <li><?= e($loc['address']) ?></li>
<?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved. A <?= e(PARENT_GROUP) ?> company.</p>
            <p class="footer__bottom-note">rotashpowerprojects.com</p>
            <p class="footer__bottom-credit">Developed by <a href="https://lesliesarai.co.zw">Leslie Sarai</a></p>
        </div>
    </div>
</footer>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
