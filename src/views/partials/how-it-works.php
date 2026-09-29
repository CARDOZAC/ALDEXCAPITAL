<?php
/**
 * ALDEX CAPITAL — Partial: Cómo funciona (3 pasos)
 */
declare(strict_types=1);

$steps = [
  ['n' => '01', 'icon' => 'send',         'title' => 'Solicitas',            'desc' => 'Nos cuentas qué necesitas ejecutar. Sin formularios eternos ni compromisos.'],
  ['n' => '02', 'icon' => 'file-text',    'title' => 'Acordamos por escrito', 'desc' => 'Confirmamos alcance y tarifa antes de empezar. Sabes exactamente qué recibes y cuánto cuesta.'],
  ['n' => '03', 'icon' => 'check-circle', 'title' => 'Ejecutamos y entregamos', 'desc' => 'Realizamos la operación y entregamos evidencia documental o digital. Con seguimiento al cierre.'],
];
?>
<section id="how" class="section" aria-labelledby="how-title">
  <div class="container">
    <header class="sec-head sec-head--center" data-reveal="up">
      <p class="eyebrow">Cómo funciona</p>
      <h2 class="sec-title" id="how-title">
        Tres pasos. Cero <span class="accent">sorpresas</span>.
      </h2>
      <p class="sec-lead">
        Un proceso claro, con el precio confirmado antes de ejecutar y evidencia al final.
      </p>
    </header>

    <div class="steps">
      <?php foreach ($steps as $i => $step): ?>
        <article class="step spot" data-reveal="up" style="--reveal-delay: <?= $i * 90 ?>ms;">
          <span class="step__n"><?= SecurityHelper::escape($step['n']) ?></span>
          <span class="step__icon" aria-hidden="true"><?= ViewHelper::icon($step['icon'], '', 22) ?></span>
          <h3><?= SecurityHelper::escape($step['title']) ?></h3>
          <p><?= SecurityHelper::escape($step['desc']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
