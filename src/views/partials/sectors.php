<?php
/**
 * ALDEX CAPITAL — Partial: Industry Gateway
 */
declare(strict_types=1);

$sectors = ServicesModel::getSectors();
$first = $sectors[0]['accent'] ?? 'cyan';
?>
<section id="sectors" class="section" aria-labelledby="sectors-title" data-accent="<?= SecurityHelper::escape($first) ?>">
  <div class="container">
    <header class="sec-head" data-reveal="up">
      <p class="eyebrow">Sectores</p>
      <h2 class="sec-title" id="sectors-title">
        Para operaciones pequeñas que no pueden <span class="accent">perder control</span>.
      </h2>
      <p class="sec-lead">
        El mismo sistema operativo, ajustado a la realidad de cada sector. Selecciona el tuyo
        para ver dónde ALDEX suele absorber más carga.
      </p>
    </header>

    <div class="gateway" data-reveal="fade">

      <!-- Selector -->
      <div class="seg" role="tablist" aria-label="Selecciona un sector">
        <?php foreach ($sectors as $i => $sec): ?>
          <button
            class="seg__btn"
            role="tab"
            id="tab-<?= SecurityHelper::escape($sec['id']) ?>"
            data-sector="<?= SecurityHelper::escape($sec['id']) ?>"
            data-accent="<?= SecurityHelper::escape($sec['accent']) ?>"
            aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
            aria-controls="panel-<?= SecurityHelper::escape($sec['id']) ?>"
            tabindex="<?= $i === 0 ? '0' : '-1' ?>"
          >
            <?= ViewHelper::icon($sec['icon'], '', 20) ?>
            <?= SecurityHelper::escape($sec['name']) ?>
            <?= ViewHelper::icon('chevron-right', 'seg__chev', 16) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Paneles -->
      <div class="gateway-panels">
        <?php foreach ($sectors as $i => $sec): ?>
          <div
            class="gateway-panel surface <?= $i === 0 ? 'is-active' : '' ?>"
            role="tabpanel"
            id="panel-<?= SecurityHelper::escape($sec['id']) ?>"
            data-sector="<?= SecurityHelper::escape($sec['id']) ?>"
            data-accent="<?= SecurityHelper::escape($sec['accent']) ?>"
            aria-labelledby="tab-<?= SecurityHelper::escape($sec['id']) ?>"
          >
            <div class="gateway-panel__head">
              <span class="gateway-panel__icon" aria-hidden="true"><?= ViewHelper::icon($sec['icon'], '', 26) ?></span>
              <h3><?= SecurityHelper::escape($sec['name']) ?></h3>
            </div>
            <p class="gateway-panel__desc"><?= SecurityHelper::escape($sec['desc']) ?></p>
            <div class="gateway-needs">
              <?php foreach ($sec['needs'] as $need): ?>
                <div class="gateway-need"><?= ViewHelper::icon('check-circle', '', 16) ?> <?= SecurityHelper::escape($need) ?></div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>
