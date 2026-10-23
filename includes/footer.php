</main>
<?php $code = current_market_code(); $m = market($code); $cp = contact_point($code); ?>
<footer class="site-footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__brand"><a class="brand brand--footer" href="<?= e(mp('')) ?>"><img src="/assets/img/logo-mark-white.png" alt="" width="38" height="38" class="brand__mark"><span class="brand__text"><strong>Rotash</strong> <span>Power Projects</span></span></a><p class="footer__tagline">Cooling systems engineered for real operational needs.</p><p class="footer__group">Refrigeration and air-conditioning engineering across Zimbabwe, South Africa and the United Kingdom.</p></div>
      <div class="footer__col"><h2 class="footer__heading">Explore</h2><ul class="footer__links"><li><a href="<?= e(mp('services/')) ?>">Services</a></li><li><a href="<?= e(mp('about/')) ?>">About Rotash</a></li><li><a href="<?= e(mp('locations/')) ?>">Regions</a></li><li><a href="<?= e(mp('contact/')) ?>">Contact</a></li></ul></div>
      <div class="footer__col"><h2 class="footer__heading">Capabilities</h2><ul class="footer__links"><li><a href="<?= e(mp('services/')) ?>#refrigeration">Commercial refrigeration</a></li><li><a href="<?= e(mp('services/')) ?>#air-conditioning">Air conditioning</a></li><li><a href="<?= e(mp('services/')) ?>#medical-refrigeration">Medical refrigeration</a></li><li><a href="<?= e(mp('services/')) ?>#maintenance">Maintenance and repairs</a></li></ul></div>
      <div class="footer__col footer__col--contact"><h2 class="footer__heading">Group enquiries</h2><ul class="footer__contact"><li><a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a></li><li><a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a></li><li class="footer__contact-note"><?= e($cp['hours']) ?></li></ul></div>
    </div>
    <div class="footer__bottom"><p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p><p class="footer__bottom-note">rotashpowerprojects.com</p></div>
  </div>
</footer>
<script src="/assets/js/main.js" defer></script>
</body></html>
