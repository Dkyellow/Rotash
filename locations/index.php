<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'locations',
    'title'       => 'Locations & Contact | Rotash Power Projects',
    'description' => 'Offices and contact routes for Rotash Power Projects in Zimbabwe, South Africa and the United Kingdom, including the Eastern Cape offices.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';

$ph = [
    'eyebrow' => 'Locations',
    'title'   => 'Local teams, one standard',
    'lede'    => 'Three countries, three local teams and one engineering standard. Contact details below route you to the team that covers your project.',
    'image'   => '/assets/img/commercial-buildings.jpg',
    'alt'     => 'Glass commercial office buildings viewed from street level',
    'meta'    => [
        'Countries' => 'Zimbabwe · South Africa · United Kingdom',
        'Group'     => PARENT_GROUP,
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<?php
$offices = ['zimbabwe', 'south-africa', 'uk'];
$office_head = [
    'eyebrow' => 'Offices and contact',
    'title'   => 'Where to find us',
    'copy'    => 'Each market publishes its own contact routes. Where local details are still being confirmed, the group team handles enquiries directly so you are never left without a way to reach us.',
];
require __DIR__ . '/../includes/sections/offices.php';
?>

<!-- Group desk -->
<section class="section section--ink">
    <div class="container">
        <div class="grid grid--split">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark">Group desk</p>
                <h2 class="display-lg">One enquiry route, whatever the market</h2>
                <p class="method__copy">If you are not sure which team covers your project, or if the requirement spans more than one country, the group desk will route it for you.</p>
            </div>
            <div class="contact-desk reveal" data-delay="1">
                <p class="contact-desk__label">Group enquiries</p>
                <p class="contact-desk__row"><span><?= icon('phone', 'line-icon') ?>Phone</span><a href="tel:<?= e(tel_href(GROUP_CONTACT['phone'])) ?>"><?= e(GROUP_CONTACT['phone']) ?></a></p>
                <p class="contact-desk__row"><span><?= icon('mail', 'line-icon') ?>Email</span><a href="mailto:<?= e(GROUP_CONTACT['email']) ?>"><?= e(GROUP_CONTACT['email']) ?></a></p>
                <p class="contact-desk__row"><span><?= icon('chat', 'line-icon') ?>WhatsApp</span><a href="https://wa.me/<?= e(GROUP_CONTACT['whatsapp']) ?>" target="_blank" rel="noopener">+<?= e(GROUP_CONTACT['phone']) ?></a></p>
                <p class="contact-desk__row"><span><?= icon('clock', 'line-icon') ?>Hours</span><?= e(GROUP_CONTACT['hours']) ?></p>
            </div>
        </div>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Not sure who to contact?',
    'copy'    => 'Describe the project and we will put it in front of the team that covers it.',
    'primary' => ['label' => 'Send an enquiry', 'href' => mp('contact/')],
    'secondary' => ['label' => 'See our services', 'href' => mp('services/')],
];
require __DIR__ . '/../includes/sections/cta.php';
?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
