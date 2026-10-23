<?php
/**
 * Delivery method, the four stages shared by every market page so the
 * same process is not restated in slightly different words each time.
 * Expects: $method = ['eyebrow','title','copy','cta' => ['label','href']]
 */
global $METHOD_STAGES;
$method = array_merge([
    'eyebrow' => 'How we work',
    'title'   => 'One method, from survey to handover',
    'copy'    => 'The sequence below is the same on every job, in every market and on every discipline. It is what turns a list of equipment into a system you can rely on.',
    'cta'     => null,
    'id'      => 'method',
], $method ?? []);
?>
<section class="section section--ink" id="<?= e($method['id']) ?>">
    <div class="container">
        <div class="grid grid--method">
            <div class="method__intro reveal">
                <p class="eyebrow eyebrow--on-dark"><?= e($method['eyebrow']) ?></p>
                <h2 class="display-lg"><?= e($method['title']) ?></h2>
                <p class="method__copy"><?= e($method['copy']) ?></p>
<?php if ($method['cta']): ?>
                <a class="btn btn--on-dark mt-8" href="<?= e($method['cta']['href']) ?>"><?= e($method['cta']['label']) ?></a>
<?php endif; ?>
            </div>
            <ol class="method__list reveal" data-delay="1">
<?php foreach ($METHOD_STAGES as $i => $stage): ?>
                <li class="method__item">
                    <span class="method__num"><?= e($stage['num']) ?></span>
                    <div>
                        <h3 class="method__title"><?= icon($stage['icon'] ?? 'clipboard') ?><?= e($stage['name']) ?></h3>
                        <p class="method__copy"><?= e($stage['copy']) ?></p>
                    </div>
                </li>
<?php endforeach; ?>
            </ol>
        </div>
    </div>
</section>
