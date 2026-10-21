<?php
/**
 * Capability strip — verifiable facts only. No invented numbers.
 * Expects: $facts = [['value','label','note'], ...]
 */
$facts = $facts ?? [
    ['value' => '3',        'label' => 'Countries',      'note' => 'Zimbabwe, South Africa and the United Kingdom'],
    ['value' => '3',        'label' => 'Disciplines',    'note' => 'Refrigeration, air conditioning and medical cold chain'],
    ['value' => 'Direct',   'label' => 'Contracting',    'note' => 'Appointed by clients, main contractors and manufacturers'],
    ['value' => '4-stage',  'label' => 'Delivery',       'note' => 'Survey, specification, installation, maintenance'],
];
?>
<section class="section section--tight section--rule">
    <div class="container">
        <dl class="fact-strip">
<?php foreach ($facts as $i => $f): ?>
            <div class="fact reveal" data-delay="<?= $i % 4 ?>">
                <dt class="fact__label"><?= e($f['label']) ?></dt>
                <dd class="fact__value"><?= e($f['value']) ?></dd>
                <dd class="fact__note"><?= e($f['note']) ?></dd>
            </div>
<?php endforeach; ?>
        </dl>
    </div>
</section>
