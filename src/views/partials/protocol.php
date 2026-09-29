<?php
/**
 * ALDEX CAPITAL — Partial: Operating Protocol (confianza)
 */
declare(strict_types=1);

$protocols = [
  ['icon' => 'lock',    'title' => 'Confidencialidad', 'badge' => 'Activo', 'desc' => 'Cada gestión opera bajo acuerdo de reserva. Tu información no sale de ALDEX CAPITAL.'],
  ['icon' => 'file-text','title' => 'Trazabilidad',    'badge' => 'Activo', 'desc' => 'Cada acción se respalda con soporte documental o digital. Sabes qué se hizo, cuándo y cómo.'],
  ['icon' => 'award',   'title' => 'Profesionalismo',  'badge' => 'Activo', 'desc' => 'Criterio de nivel gerencial en cada tarea. Operadores estratégicos, no mensajeros.'],
  ['icon' => 'shield',  'title' => 'Modelo de pago',   'badge' => 'Activo', 'desc' => 'Trabajamos con anticipo definido. La garantía de un compromiso mutuo y sin ambigüedades.'],
];
?>
<section id="protocol" class="section" aria-labelledby="protocol-title">
  <div class="container">
    <header class="sec-head sec-head--center" data-reveal="up">
      <p class="eyebrow">Protocolo operativo</p>
      <h2 class="sec-title" id="protocol-title">
        Cuatro protocolos activos en <span class="accent">cada gestión</span>.
      </h2>
      <p class="sec-lead">
        No son valores en una pared: son reglas que se aplican y se verifican en cada entrega.
      </p>
    </header>

    <div class="protocol">
      <?php foreach ($protocols as $i => $p): ?>
        <article class="protocol-card spot" data-reveal="scale" style="--reveal-delay: <?= $i * 70 ?>ms;">
          <div class="protocol-card__head">
            <span class="protocol-card__icon" aria-hidden="true"><?= ViewHelper::icon($p['icon'], '', 22) ?></span>
            <span class="protocol-card__badge"><i aria-hidden="true"></i> <?= SecurityHelper::escape($p['badge']) ?></span>
          </div>
          <h3><?= SecurityHelper::escape($p['title']) ?></h3>
          <p><?= SecurityHelper::escape($p['desc']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
