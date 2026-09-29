<?php
/**
 * ALDEX CAPITAL — Partial: ALDEX como capa operativa
 */
declare(strict_types=1);

$flow = [
  ['icon' => 'layout',       'title' => 'Tu empresa',  'desc' => 'Detecta una necesidad operativa', 'brand' => false],
  ['icon' => 'send',         'title' => 'Solicitud',   'desc' => 'Nos cuentas qué necesitas',        'brand' => false],
  ['icon' => 'git-branch',   'title' => 'ALDEX',       'desc' => 'Absorbe el proceso',               'brand' => true],
  ['icon' => 'activity',     'title' => 'Ejecución',   'desc' => 'Con criterio y trazabilidad',      'brand' => false],
  ['icon' => 'file-text',    'title' => 'Evidencia',   'desc' => 'Soporte documental o digital',      'brand' => false],
  ['icon' => 'check-circle', 'title' => 'Cierre',      'desc' => 'Entrega y seguimiento',            'brand' => false],
];
?>
<section id="operating-layer" class="section" aria-labelledby="layer-title">
  <div class="container">
    <header class="sec-head sec-head--center" data-reveal="up">
      <p class="eyebrow">Cómo encaja ALDEX</p>
      <h2 class="sec-title" id="layer-title">
        Una capa operativa que se <span class="accent">conecta</span> a tu empresa.
      </h2>
      <p class="sec-lead">
        No reemplaza a tu equipo: absorbe el trabajo que genera fricción y lo devuelve
        ejecutado, documentado y bajo control.
      </p>
    </header>

    <div class="layer-flow" data-reveal="fade" role="list" aria-label="Flujo de una operación">
      <div class="layer-line" aria-hidden="true"><span class="layer-line__fill"></span></div>
      <?php foreach ($flow as $step): ?>
        <div class="layer-node <?= $step['brand'] ? 'layer-node--brand' : '' ?>" role="listitem">
          <div class="layer-node__badge" aria-hidden="true"><?= ViewHelper::icon($step['icon'], '', 26) ?></div>
          <h3><?= SecurityHelper::escape($step['title']) ?></h3>
          <p><?= SecurityHelper::escape($step['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
