<?php require __DIR__ . '/../includes/bootstrap.php';
require __DIR__ . '/../includes/enquiry-handler.php';

$page = [
    'key'         => 'contact',
    'title'       => 'Contact Rotash Power Projects | Project Enquiry',
    'description' => 'Send an enquiry about refrigeration, air conditioning or medical cold chain. Choose your country and deal directly with the local team.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';

$ph = [
    'eyebrow' => 'Contact',
    'title'   => 'Tell us what has to keep running',
    'lede'    => 'Describe the facility, the temperature or the comfort requirement and the constraint you are working inside. You will get an engineering response, not a sales script.',
    'image'   => '/assets/img/consultation.jpg',
    'alt'     => 'Two colleagues reviewing a document together in a meeting room',
    'meta'    => [
        'Response' => 'Aimed at ' . RESPONSE_TARGET,
        'Routes'   => 'Zimbabwe · South Africa · United Kingdom',
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<section class="section section--white">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-panel reveal">
                <p class="eyebrow">Step 01</p>
                <h2 class="display-md">Where is the work?</h2>
                <p class="contact-panel__intro">Choose the country the project is in and you will see the team and the contact route for it.</p>

                <div class="market-switch" data-market-switch role="group" aria-label="Choose the country you are contacting us from">
<?php
$current = current_market_code();
$switchOrder = ['south-africa', 'zimbabwe', 'uk', 'global'];
if ($current !== 'global' && !in_array($current, $switchOrder, true)) {
    array_unshift($switchOrder, $current);
}
foreach ($switchOrder as $mc):
    $mk = market($mc);
?>
                    <button type="button" class="market-switch__btn<?= $mc === $current ? ' is-active' : '' ?>" data-switch-market="<?= e($mc) ?>" aria-pressed="<?= $mc === $current ? 'true' : 'false' ?>"><?= e($mc === 'global' ? 'Other' : $mk['name']) ?></button>
<?php endforeach; ?>
                </div>

<?php foreach ($switchOrder as $mc):
    $cp = contact_point($mc);
    $mk = market($mc);
?>
                <div class="contact-panel__card" data-market-panel="<?= e($mc) ?>"<?= $mc !== $current ? ' hidden' : '' ?>>
                    <h3 class="contact-panel__title"><?= e($mc === 'global' ? 'Group desk' : $mk['name']) ?></h3>
                    <p class="contact-panel__note"><?= e($cp['note']) ?></p>
                    <dl class="contact-lines">
                        <div><dt><?= icon('phone', 'line-icon') ?><span class="visually-hidden">Phone</span></dt><dd><a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a></dd></div>
                        <div><dt><?= icon('mail', 'line-icon') ?><span class="visually-hidden">Email</span></dt><dd><a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a></dd></div>
<?php if ($cp['hours'] !== ''): ?>
                        <div><dt><?= icon('clock', 'line-icon') ?><span class="visually-hidden">Hours</span></dt><dd><?= e($cp['hours']) ?></dd></div>
<?php endif; ?>
<?php if ($cp['whatsapp'] !== ''): ?>
                        <div><dt><?= icon('chat', 'line-icon') ?><span class="visually-hidden">WhatsApp</span></dt><dd><a href="https://wa.me/<?= e($cp['whatsapp']) ?>" target="_blank" rel="noopener">+<?= e($cp['phone']) ?></a></dd></div>
<?php endif; ?>
<?php foreach ($cp['offices'] as $loc): ?>
                        <div><dt><?= icon('pin', 'line-icon') ?><span class="visually-hidden">Office</span></dt><dd><?= e($loc['address']) !== '' ? e($loc['address']) : e($loc['city']) . ', address to be confirmed' ?></dd></div>
<?php endforeach; ?>
                    </dl>
                </div>
<?php endforeach; ?>

                <div class="notice notice--tight">
                    <p class="notice__copy"><strong>Useful to include:</strong> the type of building, the temperature or comfort requirement, the location, whether anything is running now, and when the work is needed.</p>
                </div>
            </div>

            <div class="enquiry-panel reveal" data-delay="1">
                <p class="eyebrow">Step 02</p>
                <h2 class="display-md">The requirement</h2>
<?php require __DIR__ . '/../includes/sections/enquiry.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
